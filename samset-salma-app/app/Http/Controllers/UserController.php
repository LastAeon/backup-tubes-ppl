<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
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
        $item = new User();
        
        // validasi
        $rules = [
            'name' => 'required|string',
            'password' => 'required|string',
            'level_akses' => 'required|integer',
        ];
        // var_dump($rules);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                echo "something wrong";
            }
            return;
        }
        
        // create
        try {
            $item->name = $request->input('name');
            $item->password = $request->input('password');
            $item->level_akses = $request->input('level_akses');

            $item->save();
          } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
          }
        

        return $item; //returns the stored value if the operation was successful.
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        return User::findorFail($name);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
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

        return User::where('name', $name)->update($input); //returns the new value if the operation was successful.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        $task = User::findorFail($name); //searching for object in database using ID
        if($task->delete()){ //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }

        return 'delete fail';
    }
}
