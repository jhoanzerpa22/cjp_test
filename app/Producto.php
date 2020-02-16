<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','precio','categoria_id','marca_id'];

    public function categoria(){
    	return $this->belongsTo('App\Categoria','categoria_id');
    }

    public function marca(){
    	return $this->belongsTo('App\Marca','marca_id');
    }
}
