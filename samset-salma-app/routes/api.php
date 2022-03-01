<?php

use App\Models\AsetTanah;
use App\Models\AsetBangunan;
use Illuminate\Http\Request;
use App\Models\AsetKendaraan;
use Illuminate\Support\Facades\Route;
use App\Models\AsetFurniturePeralatan;
use App\Http\Controllers\AsetTanahController;
use App\Http\Controllers\AsetBangunanController;
use App\Http\Controllers\AsetKendaraanController;
use App\Http\Controllers\AsetFurniturePeralatanController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('asetTanah', AsetTanahController::class);
Route::resource('asetBangunan', AsetBangunanController::class);
Route::resource('asetFurniturPeralatan', AsetFurniturePeralatanController::class);
Route::resource('asetKendaraan', AsetKendaraanController::class);

// paging
Route::get("asetBangunan/page/{page}", function($page){
    $total = 10;
    return AsetBangunan::offset(($page-1)*$total)->limit($total)->get();
});

Route::get("asetTanah/page/{page}", function($page){
    $total = 10;
    return AsetTanah::offset(($page-1)*$total)->limit($total)->get();
});

Route::get("asetFurniturPeralatan/page/{page}", function($page){
    $total = 10;
    return AsetFurniturePeralatan::offset(($page-1)*$total)->limit($total)->get();
});

Route::get("asetKendaraan/page/{page}", function($page){
    $total = 10;
    return AsetKendaraan::offset(($page-1)*$total)->limit($total)->get();
});

// filter

Route::post("asetBangunan/filter", function(Request $request){
    $var = $request->all();
    $filter = [];
    for($i = 1; $i <= count($var); $i++){
        array_push($filter, explode(',', $var[strval($i)]));
    }
    $query = AsetBangunan::query();

    foreach ($filter as &$value) {
        $query->where($value[0], $value[1], $value[2]);
    }
    return $query->get();
});

Route::post("asetTanah/filter", function(Request $request){
    $var = $request->all();
    $filter = [];
    for($i = 1; $i <= count($var); $i++){
        array_push($filter, explode(',', $var[strval($i)]));
    }
    $query = AsetTanah::query();

    foreach ($filter as &$value) {
        $query->where($value[0], $value[1], $value[2]);
    }
    return $query->get();
});

Route::post("asetFurniturPeralatan/filter", function(Request $request){
    $var = $request->all();
    $filter = [];
    for($i = 1; $i <= count($var); $i++){
        array_push($filter, explode(',', $var[strval($i)]));
    }
    $query = AsetFurniturePeralatan::query();

    foreach ($filter as &$value) {
        $query->where($value[0], $value[1], $value[2]);
    }
    return $query->get();
});

Route::post("asetKendaraan/filter", function(Request $request){
    $var = $request->all();
    $filter = [];
    for($i = 1; $i <= count($var); $i++){
        array_push($filter, explode(',', $var[strval($i)]));
    }
    $query = AsetKendaraan::query();

    foreach ($filter as &$value) {
        $query->where($value[0], $value[1], $value[2]);
    }
    return $query->get();
});

// search
Route::get("asetBangunan/search/{search}", function($search){
    return AsetBangunan::where('nama_bangunan', 'like', '%'.$search.'%')->get();
});

Route::get("asetTanah/search/{search}", function($search){
    return AsetTanah::where('no_sertifikat', 'like', '%'.$search.'%')->get();
});

Route::get("asetFurniturPeralatan/search/{search}", function($search){
    return AsetFurniturePeralatan::where('nama_barang', 'like', '%'.$search.'%')->get();
});

Route::get("asetKendaraan/search/{search}", function($search){
    return AsetKendaraan::where('jenis_merk', 'like', '%'.$search.'%')->get();
});
