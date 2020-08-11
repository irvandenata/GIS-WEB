<?php

use App\Potensi;
use Illuminate\Database\Seeder;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Potensi::create([
            'nama'  => 'Ekonomi',   
    ]);
    Potensi::create([
        'nama'  => 'Lingkungan',   
]);
Potensi::create([
    'nama'  => 'Listrik',   
]);
Potensi::create([
    'nama'  => 'Tambang',   
]);
Potensi::create([
    'nama'  => 'Sosial',   
]);
    }
}
