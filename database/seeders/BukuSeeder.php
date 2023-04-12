<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'judul' => 'I/0 Bus & Motherboard',
            'slug' => Str::slug('I/0 Bus & Motherboard'),
            'isbn_issn' => '12345678',
            'sampul' => 'buku/1.jpg',
            'penulis' => 'Sutadi, Dwi',
            'penerbit' => 'Andi',
            'bahasa' => 'Indonesia',
            'tahun' => '2003',
            'kategori_id' => 3,
            'rak_id' => 12,
            'stok' => 10,
        ]);

        Buku::create([
            'judul' => '10 Kebiasaan manusia sukses tanpa batas',
            'slug' => Str::slug('10 Kebiasaan manusia sukses tanpa batas'),
            'isbn_issn' => '979-98464-8-x',
            'sampul' => 'buku/2.jpg',
            'penulis' => 'Qu`ayyid, Hamd Al',
            'penerbit' => 'Pustaka Maghfirah',
            'bahasa' => 'Indonesia',
            'tahun' => '2005',
            'kategori_id' => 3,
            'rak_id' => 12,
            'stok' => 10,
        ]);

        Buku::create([
            'judul' => '10 Langkah Belajar Logika dan Algoritma menggunakan bahasa C dan C++ di GNU/Linux',
            'slug' => Str::slug('10 Langkah Belajar Logika dan Algoritma menggunakan bahasa C dan C++ di GNU/Linux'),
            'isbn_issn' => '979-763-020-X',
            'sampul' => 'buku/3.jpg',
            'penulis' => 'AL-Musayyar, M.Sayyid Ahmad',
            'penerbit' => 'Andi',
            'bahasa' => 'Indonesia',
            'tahun' => '2005',
            'kategori_id' => 2,
            'rak_id' => 2,
            'stok' => 10,
        ]);

        Buku::create([
            'judul' => '10 Orang Dijamin Ke Surga',
            'slug' => Str::slug('10 Orang Dijamin Ke Surga'),
            'isbn_issn' => '979-561-198-4',
            'sampul' => 'buku/4.jpg',
            'penulis' => 'Aasyur, Abdullatif Ahmad',
            'penerbit' => 'Gema Insani Press',
            'bahasa' => 'Indonesia',
            'tahun' => '1991',
            'kategori_id' => 2,
            'rak_id' => 3,
            'stok' => 10,
        ]);

        Buku::create([
            'judul' => '10 Pahlawan Penyebar Islam',
            'slug' => Str::slug('10 Pahlawan Penyebar Islam'),
            'isbn_issn' => '65432789',
            'sampul' => 'buku/5.jpg',
            'penulis' => 'Al-Qadhi, Muhammad Mahmud',
            'penerbit' => 'Mitra Pustaka',
            'bahasa' => 'Indonesia',
            'tahun' => '2003',
            'kategori_id' => 2,
            'rak_id' => 4,
            'stok' => 10,
        ]);
    }
}
