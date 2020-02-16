<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductosRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Producto;

class ProductoController extends Controller
{

    public function index()
    {
        $p = Producto::orderBy('nombre')->get();

        $p->each(function($p){
            $p->marca = isset($p->marca->nombre) ? $p->marca->nombre : '';
            $p->categoria = isset($p->categoria->nombre) ? $p->categoria->nombre : '';
        });

        return $p;
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
            'precio' => 'required|number',
            'marca_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Ha ocurrido un error:'.$validator->errors(),
            ], 500);
        }

        $r = $request->all();
        return Producto::create($r);

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
        $p = Producto::find($id);

        $p->marca = isset($p->marca->nombre) ? $p->marca->nombre : '';
        $p->categoria = isset($p->categoria->nombre) ? $p->categoria->nombre : '';
        
        return $p;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Producto::findOrFail($id);
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
            'precio' => 'required|number',
            'marca_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Ha ocurrido un error:'.$validator->errors(),
            ], 500);
        }
        $obj = Producto::findOrFail($id);
        $obj->update($request->all());
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
        $obj = Producto::findOrFail($id);
        $obj->delete();
        return 204;
    }


    public function filter($type,$search){

        $p = Producto::whereHas($type, function($p) use($search)
        {
            $p->where('nombre',$search);

        })->get();

        $p->each(function($p){
            $p->marca = isset($p->marca->nombre) ? $p->marca->nombre : '';
            $p->categoria = isset($p->categoria->nombre) ? $p->categoria->nombre : '';
        });
        
        return $p;
    }
}
