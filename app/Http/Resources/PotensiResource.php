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

        $kecamatan = ($this->kecamatan->nama != "Belum di Isi") ? ', ' . $this->kecamatan->nama : '';
        $desa = ($this->desa->nama != "Belum di Isi") ? ', Kecamatan ' . $this->desa->nama : '';
        return [
            'nama' => $this->nama,
            'bangunan' => $this->bangunan->nama,
            'kabupaten' => $this->kabupaten->nama,
            'kecamatan' => "( " . $this->kecamatan->jenis . " )" . $this->kecamatan->nama,
            'desa' => $this->desa->nama,
            'alamat' => $this->kabupaten->nama . $kecamatan . $desa,
            'deskripsi' => $this->deskripsi,
            'potensi' => $this->potensi->nama,
            'icon' => $this->bangunan->icon,
            'item' => $this->potensi->nama,
            'search' => '<a class="list-group-item list-group-item-action" onClick=goTo(' . $this->latitude . ',' . $this->longitude . ')>' . $this->nama . ', ' . $this->kabupaten->nama . $kecamatan . $desa . '</a>'

        ];
    }
}
