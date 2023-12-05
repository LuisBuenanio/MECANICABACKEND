<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function proyectost()
    {
        $proyectos =   DB::table('proyecto')
            ->leftJoin('tipo_proyecto', 'proyecto.tipo_proyecto_id', '=', 'tipo_proyecto.id')
            ->select(
                'codigo',
                'nombre',
                'objetivo',
                'coordinador',
                'estado',
                'ejecutandose',
                'tipo_proyecto.descripcion'
            )
            ->get();
    return view('proyectos.proyectos', compact('proyectos'));
    }

    public function index()
    {
        return response()->json(['datos'=>Proyecto::all()]);
    }

    public function show($id)
    {
        $proyecto=Proyecto::find($id);
        if(!$proyecto){
            return response()->json(['mensaje'=>'No se encontro la proyecto'],404);
        }
        return response()->json(['datos'=>$proyecto],202);
    }
}
