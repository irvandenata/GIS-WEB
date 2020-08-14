<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    //Route::get('places', 'PlaceController@index')->name('place.index');
    // Route:: get('data/kecamatan/{id}', 'DataSelectController@kecamatan')->name('ambil.kecamatan');
    // Route:: get('data/kecamatan/{id}', 'DataSelectController@kecamatan')->name('ambil.kecamatan');
    Route:: get('master/data', 'MasterController@index')->name('ambil.data');
    // Route:: get('data/desa/{id}', 'DataSelectController@desa')->name('ambil.desa');
        
    // Route::resource('wilayah/kabupaten/api','Wilayah\KabupatenController');
    // Route::get('wilayah/kabupaten/api/search/{field}/{query}','Wilayah\KabupatenController@search');

});
