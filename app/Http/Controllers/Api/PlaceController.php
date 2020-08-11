<?php

namespace App\Http\Controllers\Api;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Resources\Place as PlaceResource;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $places = Asset::all();
        

        $geoJSONdata = $places->map(function ($place) {
            return [
                'type'       => 'Feature',
                'properties' => new PlaceResource($place),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $place->longitude,
                        $place->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }



    public function kantor(Request $request)
    {
        $places = Place::all();

        $geoJSONdata = $places->map(function ($place) {
            return [
                'type'       => 'Feature',
                'properties' => new PlaceResource($place),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $place->longitude,
                        $place->latitude,
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
