<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function docentes()
    {
        $docentes = Docente::where('estado', 2)->orderBy('nombre', 'ASC')
        ->paginate(9);
        return view('docentes.docentes', compact('docentes'));

    }

    public function docente(Docente $docente)
    {
       /*  $this->authorize('published', $docente); */
        return view('docentes.docente', compact('docente'));
    }

   
    public function index()
    {
        return response()->json(['datos'=>Docente::all()]);
    }

    public function show($id)
    {
        $docente=Docente::find($id);
        if(!$docente){
            return response()->json(['mensaje'=>'No se encontró el docente'],404);
        }
        return response()->json(['datos'=>$docente],202);
    }
   
}
