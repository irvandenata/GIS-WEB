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
    return view('home');
})->name('map');





Auth::routes();

// Route::get('dashboard', 'AssetController@index');







// Route::get('user/json','AssetController@json');




Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});


Route::resource('bangunan', 'BangunanController');

Route::group([ 'as'=>'potensi.','namespace' => 'Potensi','prefix'=>'potensi','middleware'=>'auth'], function () {
    /*
     * Outlets Endpoints
     */
   
    Route::resource('ekonomi', 'EkonomiController');
    Route::delete('ekonomi/{id}','EkonomiController@destroy')->name('ekonomi.hapus');
    Route:: get('ekonomi/data/kecamatan/{id}', 'EkonomiController@kecamatan');
    Route:: get('data/kecamatan/{id}', 'EkonomiController@kecamatan')->name('ambil.kecamatan');
    Route:: get('ekonomi/data/desa/{id}', 'EkonomiController@desa');
    Route:: get('data/desa/{id}', 'EkonomiController@desa')->name('ambil.desa');
    



    Route::resource('listrik', 'listrikController');
    
   
    
    
});


Route::group([ 'as'=>'wilayah.','namespace' => 'Wilayah','prefix'=>'wilayah','middleware'=>'auth'], function () {
    /*
     * Outlets Endpoints
     */
   

    Route::resource('kabupaten', 'KabupatenController');
    Route::resource('kecamatan', 'KecamatanController');
    Route::resource('desa', 'DesaController');
   
    
    
});
