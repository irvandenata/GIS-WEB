<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable =   [ 'id', 'nama', 'latitude','longitude','deskripsi'];
    public function kecamatans(){
        return $this->hasMany(Kecamatan::class);
    }

}
