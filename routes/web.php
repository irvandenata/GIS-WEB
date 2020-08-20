<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.map.index');
})->name('map');

Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('map', 'MapController');

Route::group(['middleware' => 'auth'], function () {
    /*
     * Outlets Endpoints
     */

    Route::resource('bangunan', 'BangunanController');
    Route::get('potensi/data/{id}', [
        'as' => 'potensi.data',
        'uses' => 'PotensiController@api'
    ]);
    Route::resource('potensi', 'PotensiController');
    Route::get('potensi/datakec/{id}', 'PotensiController@kecamatan')->name('datakec');
    Route::get('potensi/datades/{id}', 'PotensiController@desa')->name('datades');
    Route::get('potensi/datasel/{id}', 'PotensiController@sel')->name('datasel');
    //controller for listrik
    //  Route::resource('listrik', 'ListrikController',['except' => 'index']);
    //  Route::get('listrik/datakec/{id}','ListrikController@kecamatan')->name('datakec');
    //  Route::get('listrik/datades/{id}','ListrikController@desa')->name('datades');
    //endlistrik

    //controller for ekonomi
    // Route::resource('ekonomi', 'EkonomiController');
    //endekonomi


    //Route::resource('map', 'MapController');
});


Route::group(['as' => 'wilayah.', 'namespace' => 'Wilayah', 'prefix' => 'wilayah', 'middleware' => 'auth'], function () {
    /*
     * Outlets Endpoints
     */
    //controller wilayah
    Route::resource('kabupaten', 'KabupatenController');
    Route::resource('kecamatan', 'KecamatanController');
    Route::resource('desa', 'DesaController');


    //endwilayah  
});
