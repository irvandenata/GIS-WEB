<?php

namespace App\Http\Controllers\Api;

use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Resources\MasterCollection;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        return new MasterCollection(Asset::all());

    }
}
