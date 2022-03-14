<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsetFurniturePeralatan;

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
        $this->validate($request, [ //inputs are not empty or null
            'idx' => 'required',
        ]);
  
        $item = new AsetFurniturePeralatan();

        // cara 1 pake save
        // $item->nama_bangunan = $request->input('idx'); //retrieving user inputs
        // $item->save(); //storing values as an object
        
        // cara 2 pake create
        $labels = $item->getLabel();
        $data = [];
        $i = 0;
        foreach($labels as $label){
            if($i != 0){
                $data[$label] = $request->input($label, null);
            }
            $i++;
        }
        $item->create($data);    

        return $item; //returns the stored value if the operation was successful.
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
