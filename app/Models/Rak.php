<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';
    protected $fillable = ['rak', 'slug'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    public function getLokasiAttribute()
    {
        return "Rak : ($this->rak)";
    }
}
