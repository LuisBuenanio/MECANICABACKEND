<?php

namespace App\Http\Controllers;

use App\Models\TipoIntegrante;
use Illuminate\Http\Request;

class Tipo_IntegranteController extends Controller
{
    public function index()
    {
        return response()->json(['datos'=>TipoIntegrante::all()]);
    }

    public function show($id)
    {
        $tipo_integrante=TipoIntegrante::find($id);
        if(!$tipo_integrante){
            return response()->json(['mensaje'=>'No se encontro el tipo de integrante'],404);
        }
        return response()->json(['datos'=>$tipo_integrante],202);
    }
}
