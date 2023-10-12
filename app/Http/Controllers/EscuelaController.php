<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    public function index()
    {
        return response()->json(['datos'=>Escuela::all()]);
    }

    public function show($id)
    {
        $escuela=Escuela::find($id);
        if(!$escuela){
            return response()->json(['mensaje'=>'No se encontro la escuela'],404);
        }
        return response()->json(['datos'=>$escuela],202);
    }
}
