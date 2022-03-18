<?php

namespace App\Http\Controllers;

use App\Imports\AsetImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class AsetImportController extends Controller
{
    public function store(Request $request){

        
        $rules = [
            'file' => 'required|mimes:xls,xlsx'
        ];

        $messages = [
            'file' => 'file xls or xlsx required'
        ];

        // $validatedData = $request->validate('post', $rules);
        $validator = Validator::make($request->all(), $rules, $messages);

        
        // $file = $validatedData["file"];
        $validated = $validator->validated();

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                echo $message;
            }
            return;
        }
        
        $file = $validated['file'];

        

        Excel::import(new AsetImport, $file);
        // $import = new AsetImport;
        // $import->import($file);

    }
}
