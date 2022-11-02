<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Asociacion;
use App\Models\Integrante;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AsociacionController extends Controller
{
    
    public function aso()
    {
     $asociaciones = Asociacion::where('id', 1)
        ->select(
            'nombre',
            'mision',
            'vision',
            'telefono',
            'logo',
            'fecha_creacion',
            'fecha_cierre',
            'email',
            'facebook'
        )->first();
    $integrantes = DB::table('integrante')
            ->leftJoin('tipo_integrante', 'integrante.tipo_integrante_id', '=', 'tipo_integrante.id')
            ->select(
                'nombre',
                'telefono',
                'foto',
                'email',
                'estado',
                'tipo_integrante.descripcion'
            )
            ->get();
        return view('asociacion.asociacion', compact('asociaciones', 'integrantes'));
    }
    
    public function index()
    {
        return response()->json(['datos'=>Asociacion::all()]);
    }

    public function show($id)
    {
        $asociacion=Asociacion::find($id);
        if(!$asociacion){
            return response()->json(['mensaje'=>'No se encontro la Asociacion'],404);
        }
        return response()->json(['datos'=>$asociacion],202);
    }
    
}
