<?php

namespace App\Http\Controllers;

use App\Imports\AsetImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;

class MigrateSeedController extends Controller
{
    public function migrate(){
        Artisan::call('migrate:refresh');
    }

    public function seed(){
        Artisan::call('db:seed');
    }

    public function migrateSeed(){
        Artisan::call('migrate:refresh --seed');
    }
}
