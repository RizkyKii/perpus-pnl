<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['judul', 'isbn_issn', 'stok', 'sampul', 'penulis', 'penerbit', 'slug', 'kategori_id', 'rak_id', 'tahun', 'bahasa'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function buku()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = ucfirst($value);
    }

    public function setPenulisAttribute($value)
    {
        $this->attributes['penulis'] = ucfirst($value);
    }
    
}
