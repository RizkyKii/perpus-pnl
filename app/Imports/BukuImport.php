<?php

namespace App\Imports;
use Illuminate\Support\Str;
use App\Models\Buku;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BukuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Buku([
            'judul' => $row['judul'],
            'slug' => $row['slug'],
            'kd_produk' => Str::uuid(),
            'isbn_issn' => $row['isbn_issn'],
            'sampul' => $row['sampul'],
            'penulis' => $row['penulis'],
            'penerbit' => $row['penerbit'],
            'publish' => $row['publish'],
            'bahasa' => $row['bahasa'],
            'tahun' => $row['tahun'],
            'kategori_id' => $row['kategori_id'],
            'rak_id' => $row['rak_id'],
            'stok' => $row['stok']
        ]);
    }
}
