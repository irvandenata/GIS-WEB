<?php

use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
   //Route:: get('master/data', 'MasterController@index')->name('ambil.data');

   Route::apiResource('potensi','PotensiController');
   
});


Route::get('/ambildata',function(){
    $asset = Asset::all();
    return $asset;
});




