<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\Multimedia;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    
    public function galerias()
    {
        $galerias = Galeria::where('estado', 2)->orderBy('fecha_creacion', 'DESC')
            ->paginate(8);
        /* return view('galerias')->withGalerias($galerias); */
        return view('galerias.galerias', compact('galerias'));
    }

    public function showGaleria(Galeria $galeria)
    {
        $galeriap = Galeria::where('id', $galeria->id)->firstOrFail();
        $multimedia = DB::table('multimedia')
            ->where('galeria_id', '=', $galeria->id)
            ->get();
        if ($galeriap && $multimedia) {
            return view('galerias.galeria', compact('galeriap','multimedia'));
            /* return view('galeria')
                ->withNombre($galeria->nombre_galeria)
                ->withImages($multimedia); */
        }
        abort(404);
    }

    
    
    public function galer(Galeria $galeria)
    {
        
        $galeriass =   DB::table('galerias')
            ->leftJoin('multimedia', 'multimedia.galeria_id', '=', 'multimedia.id')
            ->select(
                'nombre',
                'descripcion',
                'fecha_creacion',
                'multimedia.url'
            )
            ->get();      

        return view('galerias.galeria', compact('galeriass'));
    
    }

    public function index()
    {
        return response()->json(['datos'=>Galeria::all()]);
    }

    public function show($id)
    {
        $galeria=Galeria::find($id);
        if(!$galeria){
            return response()->json(['mensaje'=>'No se encontro la galeria'],404);
        }
        return response()->json(['datos'=>$galeria],202);
    }
}
