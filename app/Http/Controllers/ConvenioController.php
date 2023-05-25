<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Convenio;

class ConvenioController extends Controller
{
    public function conveniost()
    {
        $convenios =   DB::table('convenio')
            ->leftJoin('tipo_convenio', 'convenio.tipo_convenio_id', '=', 'tipo_convenio.id')
            ->select(
                'resolucion',
                'nombre',
                'objetivo',
                'coordinador',
                'fecha_legalizacion',
                'vigencia',
                'estado',
                'tipo_convenio.descripcion'
            )
            ->where('estado',2)
            ->get();
    return view('convenios.convenios', compact('convenios'));
    }
    public function index()
    {
        return response()->json(['datos'=>Convenio::all()]);
    }

    public function show($id)
    {
        $convenio=Convenio::find($id);
        if(!$convenio){
            return response()->json(['mensaje'=>'No se encontro la Convenio'],404);
        }
        return response()->json(['datos'=>$convenio],202);
    }
}
