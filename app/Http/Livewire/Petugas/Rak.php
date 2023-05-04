<?php

namespace App\Http\Livewire\Petugas;

use App\Models\Buku;
use App\Models\Rak as ModelsRak;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Rak extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $create, $edit, $delete, $rak, $rak_id, $search;

    protected $rules = [
        'rak' => 'required',
    ];

    public function create()
    {
        $this->format();
        $this->create = true;
    }

    public function store()
    {  
        $this->validate();
        
        ModelsRak::create([
            'rak' => $this->rak,
            'slug' => Str::slug($this->rak)
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan !');

        $this->format();
    }

    public function edit(ModelsRak $rak)
    {
        $this->format();

        $this->edit = true;
        $this->rak_id = $rak->id;
        $this->rak = $rak->rak;
    }

    public function update(ModelsRak $rak)
    {   
        $this->validate();

        $rak->update([
            'rak' => $this->rak,
            'slug' => Str::slug($this->rak)
    ]);

        session()->flash('sukses', 'Data berhasil diubah !');

        $this->format();
    }

    public function delete(ModelsRak $rak)
    {
        $this->delete = true;
        $this->rak_id = $rak->id;
    }

    public function destroy(ModelsRak $rak)
    {
        $buku = Buku::where('rak_id', $rak->id)->get();
        foreach ($buku as $key => $value) {
            $value->update([
                'rak_id' => 1
            ]);
        }
        $rak->delete();

        session()->flash('sukses', 'Data berhasil dihapus !');

        $this->format();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $raks = ModelsRak::latest()->where('rak', $this->search)->paginate(5);
        } else {
            $raks = ModelsRak::latest()->paginate(5);
        }
        $count = ModelsRak::select('rak')->distinct()->get();

        return view('livewire.petugas.rak', compact('raks', 'count'));
    }

    public function format()
    {
        unset($this->create);
        unset($this->edit);
        unset($this->delete);
        unset($this->rak_id);
        unset($this->rak);
    }

    public function formatSearch()
    {
        $this->search = false;
    }
}
