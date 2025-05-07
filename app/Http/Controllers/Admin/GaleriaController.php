<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Http\Requests\GaleriaRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class GaleriaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.galerias.index')->only('index');
        $this-> middleware('can:admin.galerias.create')->only('create', 'store');        
        $this-> middleware('can:admin.galerias.edit')->only('edit', 'update');
        $this-> middleware('can:admin.galerias.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.galerias.index');
    }

    
    public function create()
    {
        return view('admin.galerias.create');
    }

    
    public function store(GaleriaRequest $request)
    {
             

        $galeria = Galeria::create($request->all());
        /* $integrante = new Integrante(); */
        $galeria->nombre = $request->nombre;  
        
        
      /*   Sube la foto de la autoridad  */
        if ($request->hasFile("portada")){
            
            $portada = $request->file("portada");
            $nombreportada = Str::slug($request->nombre).".".$portada->guessExtension();
            $ruta = public_path("img/galeria_port/");

            /* $foto->move($ruta,$nombrefoto); */
           copy($portada->getRealPath(),$ruta.$nombreportada);

            $galeria->portada = $nombreportada;
        };
        
        $galeria->save();
        Cache::flush();
        return redirect()->route('admin.galerias.index')->with('info', 'Galeria Creada correctamente');
    
    }

    
    public function edit($id)
    {
        $galeria = Galeria::findOrFail($id);
        return view('admin.galerias.edit' , compact('galeria'));
    }

    
    public function update(Request $request, $id)
    {
        $galeria = Galeria::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'portada' => 'image'
        ]);
        $galeria->update($request->all());
        
        $galeria->nombre = $request->nombre;
        
        /*   Sube la foto de la autoridad  */
          if ($request->hasFile("portada")){
              
              $portada = $request->file("portada");
              $nombreportada = Str::slug($request->nombre).".".$portada->guessExtension();
              $ruta = public_path("img/galeria_port/");
  
              $portada->move($ruta,$nombreportada);
             /*copy($portada->getRealPath(),$ruta.$nombreportada);*/
  
              $galeria->portada = $nombreportada;
          };          
          
          $galeria->save();
        return redirect()->route('admin.galerias.index')-> with('info', 'Galeria Actualizada correctamente');
  
    }

    public function destroy($id)
    {
        $galeria = Galeria::findOrFail($id);

        $rutaImagen = public_path("img/galeria_port/{$galeria->portada}");

        // Verifica si el archivo existe antes de intentar eliminarlo
        if (file_exists($rutaImagen)) {
            // Elimina el archivo físicamente
            unlink($rutaImagen);
        }
        // Elimina el registro de la base de datos

        $galeria->delete();

        return redirect()->route('admin.galerias.index')-> with('eliminar', 'ok');

    }
}
