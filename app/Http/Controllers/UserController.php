<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getUser(){
        $user = Auth::user();
        $usuario = User::find($user->id);
        $user['name'] = $usuario->nombres;
        $user['email'] = $usuario->email;
        return $user;
    }

    public function cerrarSesion(Request $request){

        $request->user()->token()->revoke();

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        $json = [
            'success' => true,
            'code' => 200,
            'message' => 'Cerraste Session.',
        ];

        return response()->json($json, '200');      
    }

}
