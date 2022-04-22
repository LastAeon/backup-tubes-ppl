<?php

use App\Models\User;
use App\Models\AsetTanah;
use App\Models\ChangeLog;
use App\Imports\AsetImport;
use Illuminate\Support\Str;
use App\Models\AsetBangunan;
use Illuminate\Http\Request;
use App\Models\AsetKendaraan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\AsetFurniturePeralatan;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AsetTanahController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\AsetImportController;
use App\Http\Controllers\MigrateSeedController;
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

// login
Route::post("login", function(Request $request){
    // validate
    $rules = [
        'name' => 'required|string',
        'password' => 'required|string',
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        echo "post body wrong";
        return;
    }

    // get user
    $user = User::where('name', '=', $request->input('name'))->first();

    // no username or pasword not match return -1
    if($user == null || $request->input('password') != $user->password){
        return -1;
    }
    else{ // if username and password match return akses level
        $user->api_token = Str::random(100);
        $user->saveQuietly();
        return ["level" => $user->level_akses, "api_token" => $user->api_token];
    }
});

// logout
Route::post("logout", function(Request $request){
    // validate
    $rules = [
        'api_token' => ['required', 'string'],
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return "post body wrong";
    }

    // get user
    $user = User::where('api_token', '=', $validator->validated())->first();

    // delete api token
    if($user != null){
        $user->api_token = null;
        $user->saveQuietly();
        return 1;
    }

    return 0;
});

// user
Route::middleware(['auth', 'checkUserLevel:0'])->group(function () {
    Route::resource('asetTanah', AsetTanahController::class)->only(['index', 'show']);
    Route::resource('asetBangunan', AsetBangunanController::class)->only(['index', 'show']);
    Route::resource('asetFurniturPeralatan', AsetFurniturePeralatanController::class)->only(['index', 'show']);
    Route::resource('asetKendaraan', AsetKendaraanController::class)->only(['index', 'show']);
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
});

// pj
Route::middleware(['auth', 'checkUserLevel:1'])->group(function () {
    Route::resource('asetTanah', AsetTanahController::class)->only(['store', 'destroy']);
    Route::resource('asetBangunan', AsetBangunanController::class)->only(['store', 'destroy']);
    Route::resource('asetFurniturPeralatan', AsetFurniturePeralatanController::class)->only(['store', 'destroy']);
    Route::resource('asetKendaraan', AsetKendaraanController::class)->only(['store', 'destroy']);

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

    // search history
    Route::get("history/search/{global_id}", function($global_id){
        return ChangeLog::where('global_id', $global_id)->get();
    });

    // Update
    // request body : {"Idx" : 3 , "key" : "value"}
    Route::post("asetBangunan/update/{id}", [AsetBangunanController::class, 'update']);
    Route::post("asetTanah/update/{id}", [AsetBangunanController::class, 'update']);
    Route::post("asetFurniturPeralatan/update/{id}", [AsetBangunanController::class, 'update']);
    Route::post("asetKendaraan/update/{id}", [AsetBangunanController::class, 'update']);

});

// admin
Route::middleware(['auth', 'checkUserLevel:2'])->group(function () {
    // migrate and seed
    Route::get("migrate", [MigrateSeedController::class, 'migrate']);
    Route::get("seed", [MigrateSeedController::class, 'seed']);
    Route::get("migrateSeed", [MigrateSeedController::class, 'migrateSeed']);
    Route::resource('account', UserController::class);
    Route::post("account/update/{name}", function(Request $request, $name){

        // validasi
        $rules = [
            'name' => 'string',
            'password' => 'string',
            'level_akses' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            echo "something wrong";
            return;
        }
        
        // create
        $input = $request->only(['name', 'password', 'level_akses']);

        if($input!=null) return User::findorFail($name)->update($input); //returns the new value if the operation was successful.
    });
});


