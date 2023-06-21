<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFP_Tree extends Model
{
    use HasFactory;

    private $root;
    private $supportThreshold;
    private $associationRules;

    public function __construct($supportThreshold = 0)
    {
        $this->root = new CFP_Node();
        $this->supportThreshold = $supportThreshold;
        $this->associationRules = [];
    }

    public function insertItemset($itemset, $support)
    {
        $this->root->insertItemset($itemset, $support);
    }

    public function mineAssociationRules()
    {
        $this->mineRulesFromNode($this->root, [], []);

        return $this->associationRules;
    }

    private function mineRulesFromNode($node, $consequent, $antecedent)
    {
        if ($node->getItem() !== null) {
            $antecedent[] = $node->getItem();
            $ruleSupport = $node->getSupport();
            $ruleConfidence = $ruleSupport / $this->calculateSupport($antecedent);

            if ($ruleConfidence >= $this->supportThreshold) {
                $this->associationRules[] = [
                    'antecedent' => $antecedent,
                    'consequent' => $consequent,
                    'support' => $ruleSupport,
                    'confidence' => $ruleConfidence
                ];
            }

            return;
        }

        foreach ($node->getChildren() as $child) {
            $newConsequent = $consequent;
            $newConsequent[] = $child->getItem();
            $this->mineRulesFromNode($child, $newConsequent, $antecedent);
        }
    }

    private function calculateSupport($itemset)
    {
        // Retrieve the support from your existing M_Support model based on the provided itemset
        $support = M_Support::whereIn('kd_produk', $itemset)->sum('support');

        return $support;
    }
}

class CFP_Node
{
    private $item;
    private $support;
    private $children;

    public function __construct($item = null, $support = 0)
    {
        $this->item = $item;
        $this->support = $support;
        $this->children = [];
    }

    public function getItem()
    {
        return $this->item;
    }

    public function getSupport()
    {
        return $this->support;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function insertItemset($itemset, $support)
    {
        $currentItem = $itemset[0];
        $remainingItemset = array_slice($itemset, 1);

        foreach ($this->children as $child) {
            if ($child->getItem() === $currentItem) {
                $child->incrementSupport($support);
                $child->insertItemset($remainingItemset, $support);
                return;
            }
        }

        $newChild = new CFP_Node($currentItem, $support);
        $this->children[] = $newChild;

        if (!empty($remainingItemset)) {
            $newChild->insertItemset($remainingItemset, $support);
        }
    }

    private function incrementSupport($support)
    {
        $this->support += $support;
    }
}
