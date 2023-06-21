<?php

namespace Database\Seeders;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('importDataBuku');

        // for ($i=0; $i < 1050; $i++) {
        //     $faker = Factory::create('id_ID');
        //     $tanggal_pinjam = $faker->dateTimeBetween('-40 month', '-2 week');
        //     $tanggal_kembali = Carbon::parse($tanggal_pinjam)->addDays(14);
        //     $tanggal_pengembalian = Carbon::parse($tanggal_pinjam)->addDays(13);

        //     $user = User::create([
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'password' => bcrypt('123123123'),
        //     ])->assignRole('peminjam');
        
        //     $peminjaman = Peminjaman::create([
        //         'kode_pinjam' => random_int(100000000, 999999999),
        //         'peminjam_id' => $user->id,
        //         'kd_barang' => Str::uuid(),
        //         'nama_peminjam' => $user->name,
        //         'petugas_pinjam' => random_int(1,2),
        //         'petugas_kembali' => random_int(1,2),
        //         'denda' => 0,
        //         'status' => 3,
        //         'tanggal_pinjam' => $tanggal_pinjam,
        //         'tanggal_kembali' => $tanggal_kembali,
        //         'tanggal_pengembalian' => $tanggal_pengembalian,
        //     ]);

        //     DetailPeminjaman::create([
        //         'peminjaman_id' => $peminjaman->id,
        //         'buku_id' => random_int(1,1000),
        //         'kode_pinjam' => $peminjaman->kode_pinjam,
        //         'kd_barang' => $peminjaman->kd_barang,
        //     ]);
        // }
    }
}
