<?php

namespace App\Http\Controllers\Api;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArrayResource;
use App\Http\Resources\MasterCollection;
use App\Http\Resources\MasterResource;
use App\Http\Resources\PotensiCollection;
use App\Http\Resources\PotensiResource;
use App\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    /**
     *
     * @return PotensiResource
     */
    public function index()
    {
        $asset = Asset::latest()->get();
        $geoJSONdata = $asset->map(function ($asset) {
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

    /**
     * @param Potensi $potensi
     * @return PotensiResource
     */
    public function show(Potensi $potensi)
    {

        $geoJSONdata = $potensi->assets->map(function ($asset) {
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
