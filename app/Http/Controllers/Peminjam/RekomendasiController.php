<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Pengujian;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function dataRekomendasi()
    {
        $dataPengujian = Pengujian::all();
        $dr = ['dataPengujian' => $dataPengujian];
       return view('livewire.peminjam.rekomendasi', $dr); 
    }
}
