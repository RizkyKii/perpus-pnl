<?php

namespace App\Http\Livewire\Petugas;

use App\Models\Buku as ModelsBuku;
use App\Models\Kategori;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Buku extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;

    public $create, $edit, $delete, $show;
    public $kategori, $rak;
    public $kategori_id, $rak_id, $baris;
    public $judul, $isbn_issn, $penulis, $penerbit, $stok, $sampul, $buku_id, $tahun, $bahasa, $search;

    protected $rules = [
        'judul' => 'required',
        'isbn_issn' => 'required',
        'penulis' => 'required',
        'sampul' => 'image|max:10240',
        'penerbit' => 'required',
        'stok' => 'required|numeric|min:1',
        'kategori_id' => 'required|numeric|min:1',  
        'tahun' => 'required',
        'bahasa' => 'required',
    ];

    protected $validationAttributes = [
        'rak_id' => 'rak',
        'kategori_id' => 'kategori',
    ];

    public function pilihKategori()
    {
        $this->rak = Rak::where('kategori_id', $this->kategori_id)->get();
    }

    public function create()
    {
        $this->format();
        
        $this->create = true;
        $this->kategori = Kategori::all();
    }

    public function store()
    {
        $this->validate();

        $this->sampul = $this->sampul->store('buku', 'public');

        ModelsBuku::create([
            'sampul' => $this->sampul,
            'judul' => $this->judul,
            'isbn_issn' => $this->isbn_issn,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'stok' => $this->stok,
            'bahasa' => $this->bahasa,
            'tahun' => $this->tahun,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
            'slug' => Str::slug($this->sampul)
        ]);

        session()->flash('sukses', 'Data buku berhasil ditambah !');
        $this->format();
    }

    public function show(ModelsBuku $buku)
    {
        $this->format();

        $this->show = true;
        $this->judul = $buku->judul;
        $this->sampul = $buku->sampul;
        $this->isbn_issn = $buku->isbn_issn;
        $this->penulis = $buku->penulis;
        $this->penerbit = $buku->penerbit;
        $this->stok = $buku->stok;
        $this->bahasa = $buku->bahasa;
        $this->tahun = $buku->tahun;
        $this->kategori = $buku->kategori->nama;
        $this->rak = $buku->rak->rak;
        $this->baris = $buku->rak->baris;
    }

    public function edit(ModelsBuku $buku)
    {
        $this->format();

        $this->edit = true;
        $this->buku_id = $buku->id;
        $this->judul = $buku->judul;
        $this->isbn_issn = $buku->isbn_issn;
        $this->penulis = $buku->penulis;
        $this->penerbit = $buku->penerbit;
        $this->stok = $buku->stok;
        $this->bahasa = $buku->bahasa;
        $this->tahun = $buku->tahun;
        $this->kategori_id = $buku->kategori_id;
        $this->rak_id = $buku->rak_id;
        $this->kategori = Kategori::all();
        $this->rak = Rak::where('kategori_id', $buku->kategori_id)->get();
    }

    public function update(ModelsBuku $buku)
    {
        $validasi = [
        'judul' => 'required',
        'isbn_issn' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'bahasa' => 'required',
        'tahun' => 'required',
        'stok' => 'required|numeric|min:1',
        'kategori_id' => 'required|numeric|min:1',  
        ];
        
        if ($this->sampul) {
            $validasi['sampul'] = 'image|max:10240';
        } 
        
        $this->validate($validasi);

        if ($this->sampul) {
            Storage::disk('public')->delete($buku->sampul);
            $this->sampul = $this->sampul->store('buku', 'public');
        } else {
            $this->sampul = $buku->sampul;
        }

        $buku->update([
            'sampul' => $this->sampul,
            'judul' => $this->judul,
            'isbn_issn' => $this->isbn_issn,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'stok' => $this->stok,
            'bahasa' => $this->bahasa,
            'tahun' => $this->tahun,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
            'slug' => Str::slug($this->sampul)
        ]);

        session()->flash('sukses', 'Data buku berhasil diubah !');
        $this->format();
        
    }

    public function delete(ModelsBuku $buku)
    {
        $this->format();

        $this->delete = true;
        $this->buku_id = $buku->id;
    }
    
    public function destroy(ModelsBuku $buku)
    {
        Storage::disk('public')->delete($buku->sampul);
        $buku->delete();

        session()->flash('sukses', 'Data buku berhasil dihapus !');
        $this->format();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        if ($this->search) {
            $buku = ModelsBuku::latest()->where('judul', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $buku = ModelsBuku::latest()->paginate(5);
        }
        
        return view('livewire.petugas.buku', compact('buku'));
    }

    public function format()
    {
        unset($this->create);
        unset($this->edit);
        unset($this->delete);
        unset($this->show);
        unset($this->buku_id);
        unset($this->judul);
        unset($this->sampul);
        unset($this->stok);
        unset($this->isbn_issn);
        unset($this->penulis);
        unset($this->penerbit);
        unset($this->kategori);
        unset($this->rak);
        unset($this->rak_id);
        unset($this->kategori_id);
        unset($this->tahun);
        unset($this->bahasa);
    }
}
