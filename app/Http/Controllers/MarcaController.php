<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcasRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Marca;

class MarcaController extends Controller
{

    public function index()
    {
        $c = Marca::orderBy('nombre')->get();
        return $c;
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
        try {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Ha ocurrido un error:'.$validator->errors(),
            ], 500);
        }

        $r = $request->all();
        return Marca::create($r);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.'.$e->getMessage(),
            ], 500);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Marca::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Marca::findOrFail($id);
        $obj->update($request->all());
        return $obj;
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
        try {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Ha ocurrido un error:'.$validator->errors(),
            ], 500);
        }
        
        $obj = Marca::findOrFail($id);
        $obj->fill([
            'nombre' => $request->nombre
        ]);
        $obj->save();
        return $obj;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.'.$e->getMessage(),
            ], 500);
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
        $obj = Marca::findOrFail($id);
        $obj->delete();
        return 204;
    }


    public function porId($id){
        $p = Marca::find($id);
        return $p;
    }
}
