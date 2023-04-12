<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234567890'),
            'email_verified_at' => now()
        ])->assignRole('admin');

        User::create([
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('1234567890'),
            'email_verified_at' => now()
        ])->assignRole('petugas');

        User::create([
            'name' => 'peminjam',
            'email' => 'peminjam@gmail.com',
            'password' => bcrypt('1234567890'),
            'email_verified_at' => now()
        ])->assignRole('peminjam');

        User::create([
            'name' => 'rizky',
            'email' => 'rizky@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ])->assignRole('peminjam');

        User::create([
            'name' => 'kii',
            'email' => 'kii@gmail.com',
            'password' => bcrypt('1234567890'),
            'email_verified_at' => now()
        ])->assignRole('peminjam');
    }
}
