<?php

namespace App\Http\Controllers;
use App\Models\Integrante;

use Illuminate\Http\Request;

class IntegranteController extends Controller
{
    public function index()
    {
        return response()->json(['datos'=>Integrante::all()]);
    }

    public function show($id)
    {
        $integrante=Integrante::find($id);
        if(!$integrante){
            return response()->json(['mensaje'=>'No se encontro la integrante'],404);
        }
        return response()->json(['datos'=>$integrante],202);
    }
}
