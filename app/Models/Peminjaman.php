<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = ['kode_pinjam', 'peminjam_id', 'kd_barang', 'nama_peminjam', 'petugas_pinjam', 'petugas_kembali', 'status', 'denda', 'tanggal_pinjam', 'tanggal_kembali', 'tanggal_pengembalian'];

    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataProduk($kdProduk)
    {
        return Buku::where('kd_produk', $kdProduk) -> first();
    }

    public function hitungTransaksi($idTransaksi)
    {
        return $this::where('kode_pinjam', $idTransaksi) -> count();
    }

    // accessor
    public function getDendaAttribute($value)
    {
        return $value ? "Rp. ($value)" : '-' ;
    }

    public function getTanggalPinjamAttribute($value)
    {
        if ($value) return Carbon::create($value)->format('d-m-Y');
    }

    public function getTanggalKembaliAttribute($value)
    {
        if ($value) return Carbon::create($value)->format('d-m-Y');
    }

    public function getTanggalPengembalianAttribute($value)
    {
        if ($value) return Carbon::create($value)->format('d-m-Y');
    }
}
