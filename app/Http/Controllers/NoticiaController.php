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
       /*  if (request()->page) {
            $key = 'noticias'.request()->page;
        } else {
            $key = 'noticias';
        }
        if (Cache::has($key)) {
            $noticias = Cache::get($key);
        } else {
            $noticias = Noticia::where('estado', 2)->orderBy('fecha_publicacion', 'DESC')->paginate(9);
            Cache::put($key, $noticias);
        }      */  
        
        $noticias = Noticia::where('estado', 2)->orderBy('fecha_publicacion', 'DESC')
        ->paginate(9);
        

        return view('noticias.noticias', compact('noticias'));
    }
    public function actualizarNoticias()
    {
        Cache::forget('noticias');
        
        // Realizar otras operaciones para actualizar las noticias

        return redirect()->route('noticias.noticias');
    }


    public function noticia(Noticia $noticia)
    {
        /* $this->authorize('published', $noticia); */
        return view('noticias.noticia', compact('noticia'));
    }

    public function index1()
    {
        $noticias = Noticia::all();

        return response()->json($noticias);
    }
    public function index()
    {
        
        $noticias = Noticia::with('images')
        ->where('estado', 2)
        ->orderBy('fecha_publicacion', 'DESC')
        ->get();

        $data = $noticias->map(function ($noticia) {
            return [
                'id' => $noticia->id,
                'titulo' => $noticia->titulo,
                'entradilla' => $noticia->entradilla,
                'portada' => $noticia->portada ? asset('img/noticias/portadas/' . $noticia->portada) : null,
                'imagenes' => $noticia->images->map(function ($imagen) {
                    return asset('img/noticias/imagenes/' . $imagen->image_path);
                }),
                'fecha_publicacion' => $noticia->fecha_publicacion,
            ];
        });

        return response()->json(['datos' => $data]);
    }


    
    public function show($id)
    {
        $noticia = Noticia::with('images')
            ->where('estado', 2)
            ->find($id);

        if (!$noticia) {
            return response()->json(['mensaje' => 'No se encontró la noticia'], 404);
        }

        $data = [
            'id' => $noticia->id,
            'titulo' => $noticia->titulo,
            'entradilla' => $noticia->entradilla,
            'portada' => $noticia->portada ? asset('img/noticias/portadas/' . $noticia->portada) : null,
            'imagenes' => $noticia->images->map(function ($imagen) {
                return asset('img/noticias/imagenes/' . $imagen->image_path);
            }),
            'fecha_publicacion' => $noticia->fecha_publicacion,
        ];

        return response()->json(['datos' => $data]);
    }
}
