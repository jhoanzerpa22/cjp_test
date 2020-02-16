<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
//use App\Http\Request\UsuariosRequest;

use App\User;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return $users;
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

     public function myUser($id) {
        $e = User::find($id); 

        return response()->json(['data' => $e], 200);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUS = $request->all();

        //$password = Hash::make($request->password);

        $new_clave = str_random(6);
        $password = Hash::make($new_clave);

        $dataUS['password'] = $password;

        $user = User::create($dataUS);
        
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return $user;
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
        $id = isset($request->id) ? $request->id : $id;

        try {

            $u = User::update($request->all());

            return $u;

        } catch (Exception $e) {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $obj = User::find($id);
                
            $obj->delete();

            return response()->json(["type"=>"INFO","message"=>"Usuario eliminado exitosamente"], 200);
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(["type"=>"WARNING","message"=>"No se puede eliminar el usuario."], 412);
        }
    }
}
