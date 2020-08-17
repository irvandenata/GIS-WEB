<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PotensiResource extends JsonResource
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
            'nama' => $this->nama,
            'bangunan' => $this->bangunan->nama,
            'alamat' => $this->kabupaten->nama.$kecamatan.$desa,
            'deskripsi' => $this->deskripsi,
            'card' => $this->card_asset,
        ];
        
    }
}
