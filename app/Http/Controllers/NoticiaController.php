<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Noticia;

use Illuminate\Support\Facades\Cache;

class NoticiaController extends Controller
{
    /* public function index()
    {
        $rowset = Noticia::where('activo', 1)->where('home', 1)->orderBy('fecha_publicacion', 'DESC')->get();

        return view('app.index',[
            'rowset' => $rowset,
        ]);
    } */
    public function noticias()
    {
        /* Metodo para almacenar en caché la consulta de noticias */
        if (request()->page) {
            $key = 'noticias'.request()->page;
        } else {
            $key = 'noticias';
        }
        if (Cache::has($key)) {
            $noticias = Cache::get($key);
        } else {
            $noticias = Noticia::where('estado', 2)->orderBy('fecha_publicacion', 'DESC')->paginate(9);
            Cache::put($key, $noticias);
        }              

        return view('noticias.noticias', compact('noticias'));
    }

    public function noticia(Noticia $noticia)
    {
        $this->authorize('published', $noticia);
        return view('noticias.noticia', compact('noticia'));
    }

    public function index()
    {
        return response()->json(['datos'=>Noticia::all()]);
    }

    public function show($id)
    {
        $noticia=Noticia::find($id);
        if(!$noticia){
            return response()->json(['mensaje'=>'No se encontro la Noticia'],404);
        }
        return response()->json(['datos'=>$noticia],202);
    }
}
