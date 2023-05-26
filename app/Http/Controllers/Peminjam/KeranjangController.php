<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KeranjangController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('peminjam/keranjang/index');
    }

    public function keranjangpdf()
    {
        // $keranjang = Keranjang::all();

        // view()->share('keranjang', $keranjang);

        $keranjang = Peminjaman::latest()->where('peminjam_id', auth()->user()->id)->where('status', '!=', 3)->first();
        view()->share('keranjang', $keranjang);
        $pdf = PDF::loadview('livewire/peminjam/bukti');
        
        return $pdf->download('bukti-pinjaman.pdf');
    }

}