<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Titulacion;
use App\Models\TipoTitulacion;

class TitulacionController extends Controller
{
    public function titulaciont()
    {
            $titulacion = Titulacion::where('id', 1)        
            ->select(
                'descripciont',
                'resumen',
                'portada',
            )
            ->first();
            $tipo_titulaciones = TipoTitulacion::where('estado', 2)->orderBy('id', 'DESC')->get();
        
            
        return view('titulacion.titulacion', compact('titulacion','tipo_titulaciones'));
    }
}
