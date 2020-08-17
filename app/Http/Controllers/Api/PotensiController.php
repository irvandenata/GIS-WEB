<?php

namespace App\Http\Controllers\Api;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Resources\PotensiCollection;
use App\Http\Resources\PotensiResource;
use App\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{

    /**
     * @param Potensi $potensi
     * @return PotensiResource 
     */
    public function show(Potensi $potensi){

        $geoJSONdata = $potensi->assets->map(function ($potensi) {
            return [
                'type'       => 'Feature',
                'properties' => new PotensiResource($potensi),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $potensi->longitude,
                        $potensi->latitude,
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
