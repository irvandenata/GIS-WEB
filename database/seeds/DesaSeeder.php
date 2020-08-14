<?php

use App\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'nama'  => 'Belum di Isi',  
            'kecamatan_id'  => 1, 
              
    ]);
    }
}
