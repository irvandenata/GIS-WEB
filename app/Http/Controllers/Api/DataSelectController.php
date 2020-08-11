<?php

namespace App\Http\Controllers\Api;

use App\Desa;
use App\Http\Controllers\Controller;
use App\Kecamatan;
use Illuminate\Http\Request;

class DataSelectController extends Controller
{
    public function kecamatan($id)
    {
      $kecamatan = Kecamatan::where("kabupaten_id","=",$id)
                    ->pluck("nama","id");
      return  json_encode($kecamatan);
    }
    public function desa($id)
    {
      $desa = Desa::where("kecamatan_id","=",$id)
                    ->pluck("nama","id");
      return json_encode($desa);
    }

}
