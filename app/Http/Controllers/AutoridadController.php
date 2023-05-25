<?php

namespace App\Http\Controllers;
use App\Models\Autoridad;

use Illuminate\Http\Request;

class AutoridadController extends Controller
{
    public function index()
    {
        return response()->json(['datos'=>Autoridad::all()]);
    }

    public function show($id)
    {
        $autoridad=Autoridad::find($id);
        if(!$autoridad){
            return response()->json(['mensaje'=>'No se encontro la autoridad'],404);
        }
        return response()->json(['datos'=>$autoridad],202);
    }
}
