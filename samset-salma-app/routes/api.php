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