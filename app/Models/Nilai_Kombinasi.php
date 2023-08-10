<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_Kombinasi extends Model
{
    use HasFactory;

    protected $table = 'nilai_kombinasi';
    protected $fillable = ['kd_pengujian', 'kd_kombinasi', 'kd_barang_a', 'kd_barang_b', 'jumlah_transaksi', 'support'];

    public function buku($kdProduk)
    {
        return Buku::where('kd_produk', $kdProduk)->first();
    }
}
