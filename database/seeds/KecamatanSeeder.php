<?php

use App\Kabupaten;
use App\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::create([
            'nama'  => 'Belum di Isi',   
    ]);
    }
}
