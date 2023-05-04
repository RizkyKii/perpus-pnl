<?php

namespace Database\Seeders;

use App\Models\Rak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rak = ['Semua', 'My Library', 'Ruang Referensi', 'Ruang Terbitan Berkala/Serial', 'Ruang Audio Visual', 'Ruang Deposit', 'Ruang Sirkulasi'];

        foreach($rak as $value){
            Rak::create([
                'rak' => $value,
                'slug' => str::slug($value)
            ]);
        }
    }
}
