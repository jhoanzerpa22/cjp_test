<?php

use Illuminate\Http\Request;

use Illuminate\Database\Connection;

Route::get('/bd', function () {

    // Test database connection
    try {
        DB::connection()->getPdo();
        echo "Connected successfully to: ---> " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Could not connect to the database. Please check your configuration. error:" . $e );
    }

    //return view('welcome');
});

Route::group(['prefix' => 'v1','middleware' => 'cors'],function(){

		Route::resource('usuarios','UsuariosController');
		Route::resource('categorias','CategoriaController');
		Route::resource('marcas','MarcaController');
		Route::resource('productos','ProductoController');
		Route::get('productos/{type}/{search}','ProductoController@filter');

});
