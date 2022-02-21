<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
