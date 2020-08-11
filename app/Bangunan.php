<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    protected $guarded = [];

    public function asset(){
        return $this->hasMany(Asset::class);
    }
    public function potensi(){
        return $this->belongsTo(Potensi::class);
    }
}
