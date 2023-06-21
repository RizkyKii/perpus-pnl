<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class M_Support extends Model
{
    use HasFactory;

    protected $table = 'tbl_support';
    protected $fillable = ['kd_pengujian', 'kd_produk', 'support'];

    public function buku($kdProduk)
    {
        return Buku::where('kd_produk', $kdProduk)->first();
    }

    public function totalTransaksi($kdProduk)
    {
        return DetailPeminjaman::where('kd_barang', $kdProduk)->count();
    }
}
