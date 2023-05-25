<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Http\Requests\NoticiaRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.noticias.index')->only('index');
        $this-> middleware('can:admin.noticias.create')->only('create', 'store');        
        $this-> middleware('can:admin.noticias.edit')->only('edit', 'update');
        $this-> middleware('can:admin.noticias.destroy')->only('destroy');
    }
    
     public function index()
    {
        return view('admin.noticias.index');
    }

     public function create()
    {
        return view('admin.noticias.create');
    }
   /*  public function store(NoticiaRequest $request)
    {
        
        $noticia = Noticia::create($request->all());

        

        if ($request->file('file')){
            $url   = Storage::put('public/noticias', $request->file('file'));

            $noticia->image()->create([
                'url' => $url
            ]);
        };
        
        $noticia->save();
        Cache::flush();
        
        return redirect()->route('admin.noticias.index')-> with('info', 'Noticia creada correctamente');;;
    } */
    public function store(NoticiaRequest $request)
    {
        $data = $request->validated();
        $data['entradilla'] = strip_tags($data['entradilla']); // Aplica strip_tags() al contenido de la noticia

        $data['contenido'] = strip_tags($data['contenido']); // Aplica strip_tags() al contenido de la noticia

        $noticia = Noticia::create($data);

        
        if ($request->file('file')){
            $url   = Storage::put('public/noticias', $request->file('file'));

            $noticia->image()->create([
                'url' => Storage::url($url)
            ]);
        };

        Cache::flush();

        return redirect()->route('admin.noticias.index')->with('info', 'Noticia creada correctamente');
    }


     

    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        $data = $request->validated();
        $data['entradilla'] = strip_tags($data['entradilla']); // Aplica strip_tags() al contenido de la noticia

        $data['contenido'] = strip_tags($data['contenido']); // Aplica strip_tags() al contenido de la noticia
        
        $noticia->update($data);

        if ($request->file('file')){
            $url   = Storage::put('public/noticias', $request->file('file'));

            if($noticia->image){
                Storage::delete($noticia->image->url);
                
                $noticia->image->update([
                    'url' => Storage::url($url)
                ]);
            }else{
                $noticia->image()->create([
                    'url' => Storage::url($url)
                ]);
            }
        }
        Cache::flush();
        return redirect()->route('admin.noticias.index')-> with('info', 'Noticia Actualizada correctamente');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        Cache::flush();
        return redirect()->route('admin.noticias.index')-> with('eliminar', 'ok');

    }
}
