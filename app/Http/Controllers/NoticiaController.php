<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Image;

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

    public function index1()
    {
        $noticias = Noticia::all();

        return response()->json($noticias);
    }
    public function index()
    {
        /* $this->authorize('published', $noticias); */
        $noticias = Noticia::where('estado', 2)->orderBy('fecha_publicacion', 'DESC')->with('image')->get();

        return response()->json([
            'datos' => $noticias->map(function ($noticia) {
                return [
                    'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'entradilla' => $noticia->entradilla,
                    'contenido' => $noticia->contenido,
                    'fecha_publicacion' => $noticia->fecha_publicacion,
                    'imagen_url' => $noticia->image ? $noticia->image->url : null,
                ];
            })
        ]);
    }


    
    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        $imagen = $noticia->image()->get();

        return response()->json([
            'id' => $noticia->id,
            'titulo' => $noticia->titulo,
            'entradilla' => $noticia->entradilla,
            'contenido' => $noticia->contenido,
            'fecha_publicacion' => $noticia->fecha_publicacion, 
            'imagen_url' => $noticia->image ? $noticia->image->url : null
        ]);
    }
}
