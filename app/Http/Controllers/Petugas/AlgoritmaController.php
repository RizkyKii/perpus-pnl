<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengujian;
use App\Models\Buku;
use App\Models\Support;
use App\Models\Nilai_Kombinasi;


class AlgoritmaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('petugas/algoritma/index');
    }

    public function hasilAnalisa(Request $request, $kdPengujian)
    {
        $dataPengujian = Pengujian::where('kd_pengujian', $kdPengujian) -> first();
        $dataSupportProduk = Support::where('kd_pengujian', $kdPengujian) -> get();
        $dataMinSupp = Support::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $dataPengujian -> min_supp) -> get();
        $dataKombinasiItemset = Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> get();
        $dataMinConfidence = Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $dataPengujian -> min_confidence) -> get();
        $totalBuku = Buku::count();
        
        $dr = [
            'dataSupport' => $dataSupportProduk, 
            'totalBuku' => $totalBuku, 
            'dataPengujian' => $dataPengujian,
            'dataMinSupport' => $dataMinSupp,
            'dataKombinasiItemset' => $dataKombinasiItemset,
            'dataMinConfidence' => $dataMinConfidence,
            'kdPengujian' => $kdPengujian
        ];
        return view('livewire.petugas.hasilAnalisa', $dr);
    }

    public function hasilRekom(Request $request, $kdPengujian)
    {
        $dataPengujian = Pengujian::where('kd_pengujian', $kdPengujian) -> first();
        $dataSupportProduk = Support::where('kd_pengujian', $kdPengujian) -> get();
        $dataMinSupp = Support::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $dataPengujian -> min_supp) -> get();
        $dataKombinasiItemset = Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> get();
        $dataMinConfidence = Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $dataPengujian -> min_confidence) -> get();
        $totalBuku = Buku::count();
        
        $dr = [
            'dataSupport' => $dataSupportProduk, 
            'totalBuku' => $totalBuku, 
            'dataPengujian' => $dataPengujian,
            'dataMinSupport' => $dataMinSupp,
            'dataKombinasiItemset' => $dataKombinasiItemset,
            'dataMinConfidence' => $dataMinConfidence,
            'kdPengujian' => $kdPengujian
        ];
        return view('livewire.peminjam.hasilRekomendasi', $dr);
    }
}
