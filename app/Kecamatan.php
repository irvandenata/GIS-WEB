<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $guard = [];
    public function desas(){
        return $this->hasMany(Desa::class);
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }
}
