<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Galeria;

class MultimediaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.multimedias.index')->only('index');
        $this-> middleware('can:admin.multimedias.create')->only('create', 'store');        
        $this-> middleware('can:admin.multimedias.edit')->only('edit', 'update');
        $this-> middleware('can:admin.multimedias.destroy')->only('destroy');
    }
    public function index()
    {
        $multimedias = Multimedia::all();
        return view('admin.multimedias.index', compact('multimedias'));
   
    }

    
    public function create()
    {
        $galeria = Galeria::pluck('nombre', 'id');
        return view('admin.multimedias.create', compact('galeria'));
    }

    
    public function store(Request $request)
    {
               
        $request->validate([
            'nombre' => 'required',
            'url' => 'required|image'
        ]);
        
        
        $multimedia = Multimedia::create($request->all());

        $multimedia->nombre = $request->nombre;  
        
        
      /*   Sube la foto de la autoridad  */
        if ($request->hasFile("url")){
            
            $url = $request->file("url");
            $nombreurl = Str::slug($request->nombre).".".$url->guessExtension();
            $ruta = public_path("img/galerias/imagenes/");

            /* $foto->move($ruta,$nombrefoto); */
           copy($url->getRealPath(),$ruta.$nombreurl);

            $multimedia->url = $nombreurl;
        };     

        $multimedia->save();
             

        return redirect()->route('admin.multimedias.index')-> with('info', 'Imagen subida correctamente');;

    }

    
    public function edit(Multimedia $multimedia)
    {
        $galeria = Galeria::pluck('nombre', 'id');
        return view('admin.multimedias.edit' , compact('multimedia', 'galeria'));
    }

    
    public function update(Request $request, Multimedia $multimedia)
    {
        $request->validate([
            'nombre' => 'required',
            'url' => 'required|image'
        ]);
        
        
        $multimedia->update($request->all()); 

        $multimedia->nombre = $request->nombre;  
        
        
      /*   Sube la foto de la autoridad  */
        if ($request->hasFile("url")){
            
            $url = $request->file("url");
            $nombreurl = Str::slug($request->nombre).".".$url->guessExtension();
            $ruta = public_path("img/galerias/imagenes/");

            /* $foto->move($ruta,$nombrefoto); */
           copy($url->getRealPath(),$ruta.$nombreurl);

            $multimedia->url = $nombreurl;
        };     

        $multimedia->save();
              

        return redirect()->route('admin.multimedias.index')-> with('info', 'Imagen actualizada correctamente');;

    }

    
    public function destroy(Multimedia $multimedia)
    {
        
        
        
        $multimedia->delete();

        return redirect()->route('admin.multimedias.index')->with('eliminar', 'ok');

    }
}
