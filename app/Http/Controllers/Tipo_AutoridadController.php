<?php

namespace App\Http\Controllers;

use App\Models\TipoAutoridad;
use Illuminate\Http\Request;

class Tipo_AutoridadController extends Controller
{
    public function index()
    {
        return response()->json(['datos'=>TipoAutoridad::all()]);
    }

    public function show($id)
    {
        $tipo_autoridad=TipoAutoridad::find($id);
        if(!$tipo_autoridad){
            return response()->json(['mensaje'=>'No se encontro el tipo de autoridad'],404);
        }
        return response()->json(['datos'=>$tipo_autoridad],202);
    }
}
