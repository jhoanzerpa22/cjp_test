<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nombre'];

    public function productos(){
    	return $this->hasMany('App\Productos','marca_id');
    }
}
