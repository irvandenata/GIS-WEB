<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    public function assets(){
        return $this->hasMany(Asset::class);
    }
    public function bangunans(){
        return $this->hasMany(Bangunan::class);
    }
}
