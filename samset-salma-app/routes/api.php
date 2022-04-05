<?php

use App\Models\AsetTanah;
use App\Models\ChangeLog;
use App\Imports\AsetImport;
use App\Models\AsetBangunan;
use Illuminate\Http\Request;
use App\Models\AsetKendaraan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\AsetFurniturePeralatan;
use App\Http\Controllers\AsetTanahController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\AsetImportController;
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
// Route::resource('history', ChangeLogController::class);

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

// import excel
Route::post("importAset", [AsetImportController::class, 'store']);

// history
Route::get("history/interval/{interval}", function($interval){
    if($interval == 'd'){
        return ChangeLog::where('created_at', '>=', Carbon::now()->subDays(1)->toDateTimeString())->get();
    }
    if($interval == 'w'){
        return ChangeLog::where('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())->get();
    }
    if($interval == 'm'){
        return ChangeLog::where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())->get();
    }
    if($interval == 'y'){
        return ChangeLog::where('created_at', '>=', Carbon::now()->subYear()->toDateTimeString())->get();
    }
    if($interval == 'a'){
        return ChangeLog::orderBy('id', 'asc')->get();
    }
    return "wrong interval";
});

// Update

// request body : {"Idx" : 3 , "key" : "value"}

Route::post("asetBangunan/update/{id}", function(Request $request, $id){

    $input = $request->only(['Nama Bangunan', 'Alamat', 'Luas_Bangunan', 'Jumlah_Lantai', 'Tahun_Dibangun', 'Tahun_Digunakan', 'Nilai_Perolehan', 'Penambahan_Nilai_Manfaat', 'Umur_Ekonomis', 'Lama_Digunakan', 'Tarif', 'Akumulasi', 'Nilai_Buku']);

    return AsetBangunan::where('Idx', $id)->update($input);
});
Route::post("asetTanah/update", function(Request $request, $id){

    $input = $request->only(['Jalan', 'No', 'RT', 'RW', 'Desa_Kelurahan', 'Kecamatan', 'Kabupaten_Kota', 'Propinsi', 'Tanggal_Perolehan', 'No_Persil', 'No_Sertifikat', 'NIB', 'Luas', 'Harga_Satuan', 'Nilai_Perolehan', 'Keterangan']);

    return AsetTanah::where('Idx', $id)->update($input);
});
Route::post("asetFurniturPeralatan/update/{id}", function(Request $request, $id){

    $input = $request->only(['nama_barang', 'merk_type', 'kategori', 'tahun_perolehan', 'sumber_perolehan', 'jumlah_perolehan', 'harga_satuan_perolehan', 'nilai_perolehan', 'UE_penyusutan', 'tarif_penyusutan', 'akumulasi_penyusutan', 'nilai_buku', 'PJ']);

    return AsetFurniturePeralatan::where('Idx', $id)->update($input);
});
Route::post("asetKendaraan/update/{id}", function(Request $request, $id){

        $input = $request->only(['Jenis_merk', 'nomor_mesin', 'nomor_rangka', 'isi_silinder', 'tahun_pembuatan', 'no_bpkb', 'no_polisi', 'sumber_dana', 'jumlah_unit', 'nilai_perolehan', 'ue_penyusutan', 'tarif_penyusutan', 'akumulasi_penyusutan', 'nilai_buku', 'pj']);

        return AsetKendaraan::where('Idx', $id)->update($input);
});

