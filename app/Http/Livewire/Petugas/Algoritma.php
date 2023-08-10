<?php

namespace App\Http\Livewire\Petugas;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Pengujian;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use App\Models\CFP_Tree;
use App\Models\Support;
use App\Models\Nilai_Kombinasi;

class Algoritma extends Component
{
    public function prosesAnalisaAlgoritma(Request $request)
    {   
        $minSupp = $request->support;
        $minConfidence = $request->confidence;

        // insert data pengujian 
        $kdPengujian = Str::uuid();
        $pengujian = new Pengujian();
        $pengujian->kd_pengujian = $kdPengujian;
        $pengujian->nama_penguji = $request->nama;
        $pengujian->min_supp = $minSupp;
        $pengujian->min_confidence = $minConfidence;

        $totalBuku = Buku::count();

        $this->generateItemset($kdPengujian, $totalBuku);

        $frequentItemsets = $this->runCFPTree($kdPengujian);

          
        usort($frequentItemsets, function ($a, $b) {
        return $b['support'] - $a['support'];
        });

        $this->combinationItemset($kdPengujian, $minSupp);

        $this->storeItemset($kdPengujian, $totalBuku);

        $pengujian->save();
        $dr = ['status' => 'sukses', 'kdPengujian' => $kdPengujian];
        return response()->json($dr);
    }

    private function generateItemset($kdPengujian, $totalBuku)
    {
        // cari nilai support 
        $buku = Buku::all();
        foreach ($buku as $item) {
            $kdProduk = $item->kd_produk;
            $totalTransaksi = DetailPeminjaman::where('kd_barang', $kdProduk)->count();
            $nSupport = ($totalTransaksi / $totalBuku) * 100;
            $supp = new Support();
            $supp->kd_pengujian = $kdPengujian;
            $supp->kd_produk = $kdProduk;
            $supp->support = $nSupport;
            $supp->save();
        }
    }

    private function runCFPTree($kdPengujian)
    {
        $nilaiKombinasi = Nilai_Kombinasi::where('kd_pengujian', $kdPengujian)->get();

        // Create a new instance of the CFP-Tree
        $cfpTree = new CFP_Tree();

        // Insert support data into the CFP-Tree
        foreach ($nilaiKombinasi as $nk) {
            $kdBarangA = $nk->kd_barang_a;
            $kdBarangB = $nk->kd_barang_b;
            $support = $nk->support;

            $cfpTree->insertItemset([$kdBarangA, $kdBarangB], $support);
        }

        // Perform association rule mining using the CFP-Tree
           return $cfpTree->mineAssociationRules();
    }

    private function combinationItemset($kdPengujian, $minSupp)
    {
        // kombinasi 2 item set 
        $qProdukA = Support::where('kd_pengujian', $kdPengujian)
            ->where('support', '>=', $minSupp)
            ->get();

        foreach ($qProdukA as $qProdA) {
            $kdProdukA = $qProdA->kd_produk;
            $qProdukB = Support::where('kd_pengujian', $kdPengujian)
                ->where('support', '>=', $minSupp)
                ->get();

            foreach ($qProdukB as $qProdB) {
                $kdProdukB = $qProdB->kd_produk;
                Nilai_Kombinasi::where('kd_barang_a', $kdProdukB)->count();

                if ($kdProdukA == $kdProdukB) {
                    continue;
                } else {
                    $kdKombinasi = Str::uuid();
                    $nk = new Nilai_Kombinasi();
                    $nk->kd_pengujian = $kdPengujian;
                    $nk->kd_kombinasi = $kdKombinasi;
                    $nk->kd_barang_a = $kdProdukA;
                    $nk->kd_barang_b = $kdProdukB;
                    $nk->jumlah_transaksi = 0;
                    $nk->support = 0;
                    $nk->save();
                }
            }
        }
    }

    private function storeItemset($kdPengujian, $totalBuku)
    {
        // kombinasi 2 itemset yg memenuhi nilai support
        $nilaiKombinasi = Nilai_Kombinasi::where('kd_pengujian', $kdPengujian)->get();
        foreach ($nilaiKombinasi as $nk) {
            $kdKombinasi = $nk->kd_kombinasi;
            $kdBarangA = $nk->kd_barang_a;
            $kdBarangB = $nk->kd_barang_b;

            // cari total transaksi 
            $dataPinjam = DetailPeminjaman::distinct()->get(['kode_pinjam']);
            $fnTransaksi = 0;
            foreach ($dataPinjam as $pinjam) {
                $noPinjam = $pinjam->kode_pinjam;
                $qBonTransaksiA = DetailPeminjaman::where('kode_pinjam', $noPinjam)
                    ->where('kd_barang', $kdBarangA)
                    ->count();
                $qBonTransaksiB = DetailPeminjaman::where('kode_pinjam', $noPinjam)
                    ->where('kd_barang', $kdBarangB)
                    ->count();

                if ($qBonTransaksiA == 1 && $qBonTransaksiB == 1) {
                    $fnTransaksi++;
                }
            }

            $support = ($fnTransaksi / $totalBuku) * 100;
            Nilai_Kombinasi::where('kd_pengujian', $kdPengujian)
                ->where('kd_kombinasi', $kdKombinasi)
                ->update([
                    'jumlah_transaksi' => $fnTransaksi,
                    'support' => $support
                ]);
        }
    }
}
