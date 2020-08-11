<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $guard = [];
    public function kecamatans(){
        return $this->hasMany(Kecamatan::class);
    }

}
