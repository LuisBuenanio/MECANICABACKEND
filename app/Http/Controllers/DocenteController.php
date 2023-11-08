<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Docente;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function docentes()
    {
        $docentes = Docente::where('estado', 2)->orderBy('id', 'DESC')
        ->paginate(8);
        return view('docentes.docentes', compact('docentes'));

    }

    public function docente(Docente $docente)
    {
       /*  $this->authorize('published', $docente); */
        return view('docentes.docente', compact('docente'));
    }
}
