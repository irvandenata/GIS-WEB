<?php

use App\Kabupaten;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabupaten::create([
            'nama'  => 'Belum di Isi', 
            
    ]);
    }
}
