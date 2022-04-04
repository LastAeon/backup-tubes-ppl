<?php

namespace App\Http\Controllers;

use App\Models\AsetBangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AsetBangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AsetBangunan::orderBy('Idx', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new AsetBangunan();
        $labels = $item->getLabel();

        $rules = [];
        foreach($labels as $label){
            $rules[$label] = 'nullable';
        }
        $rules['Foto'] = 'nullable|image';
        $rules['Pendukung'] = 'nullable|image';
        // var_dump($rules);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                echo "something wrong";
            }
            return;
        }
        
        // cara 2 pake create
        $data = [];
        $i = 0;
        foreach($labels as $label){
            $data[$label] = $request->input($label, null);
            $i++;
        }

        
        if($request->hasFile('Foto')){
            $uploadFolder = 'Foto';
            $image = $request->file('Foto');
            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $data['Foto'] = asset('storage/'.$image_uploaded_path);
        }
        if($request->hasFile('Pendukung')){
            $uploadFolder = 'Pendukung';
            $image = $request->file('Pendukung');
            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $data['Pendukung'] = asset('storage/'.$image_uploaded_path);
        }
        $item->create($data);
        
        // var_dump($data);

        return $data; //returns the stored value if the operation was successful.

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return AsetBangunan::findorFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
