<?php

namespace App\Http\Controllers\Api;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Resources\MasterCollection;

use Illuminate\Http\Request;

class MasterController extends Controller
{
   

    public function index(Request $request)
    {
        $places = Asset::all();
        

        $geoJSONdata = $places->map(function ($place) {
            return [
                'type'       => 'Feature',
                'properties' => "dwdd",

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
