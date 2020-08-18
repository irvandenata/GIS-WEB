<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $kecamatan = ($this->kecamatan->nama != "Belum di Isi")? ', '.$this->kecamatan->nama:'';
        $desa = ($this->desa->nama != "Belum di Isi")? ', Kecamatan '.$this->desa->nama:'';
        return [
      
            'search' => '<li class="list-group-item"> <a onClick=goTo('.[$this->latitude , $this->longitude].')>'.$this->nama.', '.$this->kabupaten->nama.$kecamatan.$desa.'</a></li>'
        ];
    }
}
