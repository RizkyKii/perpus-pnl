<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = ['none', 'Reference', 'Textbook', 'Novel/Fiction', 'Terbitan Berkala/Serial', 'Audio Visual', 'Tugas Akhir Mahasiswa', 'Harian Surat Kabar',
                     'Koleksi Deposid', 'Laporan penelitian', 'Tesis', 'Disertasi', 'Skripsi', 'Majalah', 'Jurnal nasional', 'Brosur', 'Tabloid',
                     'Bulletin', 'Leaflet', 'Laporan kerja praktek', 'Kamus', 'Modul Ajar', 'Proseding', 'Jobsheet', 'Modul Praktikum', 'Satuan Acara Pengajaran',
                     'Karya Ilmiah', 'Jurnal Internasional', 'Terbitan Pemerintah', 'Jurnal Nasional Terakreditasi'];

        foreach($kategori as $value){
            Kategori::create([
                'nama' => $value,
                'slug' => str::slug($value)
            ]);
        }

    }
}
