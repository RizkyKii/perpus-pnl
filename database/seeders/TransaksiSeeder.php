<?php

namespace Database\Seeders;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // data 1
         Peminjaman::create([
            'kode_pinjam' => random_int(100000000, 999999999),
            'peminjam_id' => 3,
            'petugas_pinjam' => 1,
            'petugas_kembali' => 1,
            'status' => 3,
            'denda' => 0,
            'tanggal_pinjam' => now()->subDays(20),
            'tanggal_kembali' => now()->subDays(10),
            'tanggal_pengembalian' => now()->subDays(11)
        ]);
        
        DetailPeminjaman::create([
            'peminjaman_id' => 1,
            'buku_id' => 1
        ]);
        DetailPeminjaman::create([
            'peminjaman_id' => 1,
            'buku_id' => 2
        ]);
       
    }
}
