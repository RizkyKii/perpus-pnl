<?php

namespace App\Http\Livewire\Petugas;

use App\Models\Pengujian;
use Livewire\Component;

class LihatRekom extends Component
{
    public $delete, $pengujian_id;

    public function delete(Pengujian $kdPengujian)
    {
        $this->format();
        $this->delete = true;
        $this->pengujian_id = $kdPengujian->id;
    }

    public function destroy (Pengujian $kdPengujian)
    {
        $kdPengujian->delete();

        session()->flash('sukses', 'Data rekomendasi berhasil dihapus !');

        $this->format();
    }

    public function render()
    {
        $kdPengujian = Pengujian::all();
        $dr = ['kdPengujian' => $kdPengujian];
        return view('livewire.petugas.lihat-rekom', $dr);
    }

    public function format()
    {
        unset($this->delete);
    }
}
