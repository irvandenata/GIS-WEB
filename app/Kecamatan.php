<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable =   [ 'id', 'nama','jenis','kabupaten_id', 'latitude','longitude','deskripsi'];
    public function desas(){
        return $this->hasMany(Desa::class);
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }
}
