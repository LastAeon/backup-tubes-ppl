<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsetFurniturePeralatan;
use Illuminate\Support\Facades\Validator;

class AsetFurniturePeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AsetFurniturePeralatan::orderBy('Idx', 'asc')->get();
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
        $item = new AsetFurniturePeralatan();
        $labels = $item->getLabel();

        $rules = [];
        foreach($labels as $label){
            $rules[$label] = 'nullable';
        }
        $rules['Foto'] = 'nullable|image';
        $rules['Pendukung'] = 'nullable|file';
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
        return $item->create($data); //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AsetFurniturePeralatan::findorFail($id);
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
        $item = new AsetFurniturePeralatan();
        $input = $request->only($item->getLabel());

        if($input!=null) return AsetFurniturePeralatan::find($id)->update($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = AsetFurniturePeralatan::findorFail($id); //searching for object in database using ID
        if($task->delete()){ //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }

        return 'delete fail';
    }
}
