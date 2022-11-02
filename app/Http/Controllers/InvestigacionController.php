<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoInvestigacion;
use Illuminate\Support\Facades\DB;

class InvestigacionController extends Controller
{
    public function investigacionts()
    {
        $grupos_investigaciones = GrupoInvestigacion::where('estado', 2)
        ->paginate(8);
    
        $investigadores = DB::table('investigador')
            ->leftJoin('tipo_investigador', 'investigador.tipo_investigador_id', '=', 'tipo_investigador.id')
            ->select(
                'nombre',
                'email',
                'estado',
                'tipo_investigador.descripcion'
            )
        ->get(); 
        return view('investigacion.investigacion', compact('grupos_investigaciones','investigadores'));
    } 
    /* public function investigaciont()
    {
        $grupos_investigaciones = GrupoInvestigacion::where('estado', 2)
            ->paginate(8);
        return view('investigacion.grupos_investigacion', compact('grupos_investigaciones'));
    }*/

    /*public function showinvestigacion(GrupoInvestigacion $grupo_investigacion)
    {
        $grupos_investigacionesp = GrupoInvestigacion::where('id', $grupo_investigacion->id)->firstOrFail();
        $investigadores = DB::table('investigador')
            ->where('grupo_investigacion_id', '=', $grupo_investigacion->id)
            ->get();
        if ($grupos_investigacionesp && $investigadores) {
            return view('investigacion.grupo_investigacion', compact('grupos_investigacionesp','investigadores'));
           
        }
        abort(404);
    }*/
    public function investigaciontss(GrupoInvestigacion $grupo_investigacion)
    {
        $grupos_investigacionesp = GrupoInvestigacion::where('id', $grupo_investigacion->id)->firstOrFail();
        $investigadores = DB::table('investigador')
            ->where('grupo_investigacion_id', '=', $grupo_investigacion->id)
            ->get();
        if ($grupos_investigacionesp && $investigadores) {
            return view('investigacion.investigacion', compact('grupos_investigacionesp','investigadores'));
        }
        abort(404);
    }

    
}
