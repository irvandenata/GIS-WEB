<?php

namespace App\Http\Resources\wilayah\kabupaten;

use Illuminate\Http\Resources\Json\ResourceCollection;

class KabupatenCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' =>$this->collection->transform(function($data){
                return [
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'latitude' => $data->latitude,
                    'longitude' => $data->longitude,
                    'deskripsi' => $data->deskripsi,
                ];
            })
        ];
    }
}
