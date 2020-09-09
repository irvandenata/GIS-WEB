<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MasterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $geoJSONdata = $this->assets->map(function ($asset) {
            return [
                'type'       => 'Feature',
                'properties' => new PotensiResource($asset),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $asset->longitude,
                        $asset->latitude,
                    ],
                ],
            ];
        });


        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
