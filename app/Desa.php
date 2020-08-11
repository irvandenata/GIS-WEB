<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $guard = [];

    public function asset(){
        return $this->hasMany(Asset::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    
}


