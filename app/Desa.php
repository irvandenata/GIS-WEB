<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable =   [ 'id', 'nama','kecamatan_id', 'latitude','longitude','deskripsi'];

    public function asset(){
        return $this->hasMany(Asset::class);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    
}


