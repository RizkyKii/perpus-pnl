<?php

namespace App\Http\Controllers\Petugas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\M_Pengujian;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use App\Models\M_Support;
use App\Models\M_Nilai_Kombinasi;
use App\Models\Peminjaman;

class MetodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        return view('petugas/metode/index');
    }

    public function prosesAnalisaApriori(Request $request)
    {
        $minSupp = $request -> support;
        $minConfidence = $request -> confidence;
        // 'support': support,
        //     'confidence': confidence,
        //     'nama' : nama
        // $
        // insert data pengujian 
        $kdPengujian = Str::uuid();
        $pengujian = new M_Pengujian();
        $pengujian -> kd_pengujian = $kdPengujian;
        $pengujian -> nama_penguji = $request -> nama;
        $pengujian -> min_supp = $minSupp;
        $pengujian -> min_confidence = $minConfidence;
        $totalBuku = Buku::count();
        // cari nilai support 
        $buku = Buku::all();
        foreach($buku as $item){
            $kdProduk = $item -> kd_produk;
            $totalTransaksi = Peminjaman::where('kd_barang', $kdProduk) -> count();
            $nSupport = ($totalTransaksi / $totalBuku) * 100;
            $supp = new M_Support();
            $supp -> kd_pengujian = $kdPengujian;
            $supp -> kd_produk = $kdProduk;
            $supp -> support = $nSupport;
            $supp -> save();
        }
        // kombinasi 2 item set 
        $qProdukA = M_Support::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $minSupp) -> get();
        foreach($qProdukA as $qProdA){
            $kdProdukA = $qProdA -> kd_produk;
            $qProdukB = M_Support::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $minSupp) -> get();
            foreach($qProdukB as $qProdB){
                $kdProdukB = $qProdB -> kd_produk;
                $jumB = M_Nilai_Kombinasi::where('kd_barang_a', $kdProdukB) -> count();
                if($jumB > 0){

                }else{
                    if($kdProdukA == $kdProdukB){

                    }else{
                        $kdKombinasi = Str::uuid();
                        $nk = new M_Nilai_Kombinasi();
                        $nk -> kd_pengujian = $kdPengujian;
                        $nk -> kd_kombinasi = $kdKombinasi;
                        $nk -> kd_barang_a = $kdProdukA;
                        $nk -> kd_barang_b = $kdProdukB;
                        $nk -> jumlah_transaksi = 0;
                        $nk -> support = 0;
                        $nk -> save();
                    }
                }
            }
        }

        // kombinasi 2 itemset phase 2
        $nilaiKombinasi = M_Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> get();
        $no = 1;
        foreach($nilaiKombinasi as $nk){
            $kdKombinasi = $nk -> kd_kombinasi;
            $kdBarangA = $nk -> kd_barang_a;
            $kdBarangB = $nk -> kd_barang_b;

            // cari total transaksi 
            $dataPinjam = Peminjaman::distinct() -> get(['kode_pinjam']);
            $fnTransaksi = 0;
            foreach($dataPinjam as $pinjam){
                $noPinjam = $pinjam -> kode_pinjam;
                $qBonTransaksiA = Peminjaman::where('kode_pinjam', $noPinjam) -> where('kd_barang', $kdBarangA) -> count();
                $qBonTransaksiB = Peminjaman::where('kode_pinjam', $noPinjam) -> where('kd_barang', $kdBarangB) -> count();
                if($qBonTransaksiA == 1 && $qBonTransaksiB == 1){
                    $fnTransaksi++;
                }
            }
            $support = ($fnTransaksi / $totalBuku) * 100;
            M_Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> where('kd_kombinasi', $kdKombinasi) -> update([
                'jumlah_transaksi' => $fnTransaksi,
                'support' => $support
            ]);
            // for($x = 1; $x <= $totalFaktur; $x++){
            //     $bonTransaksi1 = M_Penjualan::where('no')
            // }

        }

        $pengujian -> save();
        $dr = ['status' => 'sukses', 'kdPengujian' => $kdPengujian];
        return \Response::json($dr);
    }
    
    public function hasilAnalisa(Request $request, $kdPengujian)
    {
        $dataPengujian = M_Pengujian::where('kd_pengujian', $kdPengujian) -> first();
        $dataSupportProduk = M_Support::where('kd_pengujian', $kdPengujian) -> get();
        $dataMinSupp = M_Support::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $dataPengujian -> min_supp) -> get();
        $dataKombinasiItemset = M_Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> get();
        $dataMinConfidence = M_Nilai_Kombinasi::where('kd_pengujian', $kdPengujian) -> where('support', '>=', $dataPengujian -> min_confidence) -> get();
        $totalBuku = Buku::count();
        // dd($dataSupportProduk);
        $dr = [
            'dataSupport' => $dataSupportProduk, 
            'totalBuku' => $totalBuku, 
            'dataPengujian' => $dataPengujian,
            'dataMinSupport' => $dataMinSupp,
            'dataKombinasiItemset' => $dataKombinasiItemset,
            'dataMinConfidence' => $dataMinConfidence,
            'kdPengujian' => $kdPengujian
        ];
        return view('livewire.petugas.hasil-analisa', $dr);
    }
}
