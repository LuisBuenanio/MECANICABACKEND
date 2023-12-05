<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigador;
use App\Models\GrupoInvestigacion;
use Illuminate\Support\Facades\DB;

class GrupoInvestigacionController extends Controller
{
    public function gruposinvestigacion()
    {
        $grupos = GrupoInvestigacion::where('estado', 2)->orderBy('nombre', 'ASC')
        ->paginate(9);
        return view('grupos.grupos-investigacion', compact('grupos'));

    }

    public function grupoinvestigacion(GrupoInvestigacion $grupo)
    {

        /* $grupo = GrupoInvestigacion::with('lineasInvestigacion.programasInvestigacion', 'investigadores')->find($grupo);
 */
         
        return view('grupos.grupo-investigacion', compact('grupo'));
        
    }
}
