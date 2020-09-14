<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    protected $fillable = ['nama', 'icon', 'potensi_id'];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
    public function potensi()
    {
        return $this->belongsTo(Potensi::class);
    }
}
