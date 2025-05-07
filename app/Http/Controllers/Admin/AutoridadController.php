<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Autoridad;
use App\Models\TipoAutoridad;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class AutoridadController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.autoridades.index')->only('index');
        $this-> middleware('can:admin.autoridades.create')->only('create', 'store');        
        $this-> middleware('can:admin.autoridades.edit')->only('edit', 'update');
        $this-> middleware('can:admin.autoridades.destroy')->only('destroy');
    }
    public function index()
    {
        $autoridades = Autoridad::all();
        return view('admin.autoridades.index', compact('autoridades'));
    }

    
    public function create()
    {
        $tipo_autoridad = TipoAutoridad::pluck('descripcion', 'id');
        
        return view('admin.autoridades.create', compact('tipo_autoridad'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $autoridad = Autoridad::create($request->all());
        
        $autoridad->nombre = $request->nombre;  
        
        /* sube la hoja de vida de la autoridad */
        if ($request->hasFile("hoja_vida")){
            
            $hoja_vida = $request->file("hoja_vida");
            $nombrehoja_vida = Str::slug($request->nombre).".".$hoja_vida->guessExtension();
            $ruta = public_path("docs/autoridades/");

            /* $logo_escuela->move($ruta,$nombrelogo_escuela); */
            copy($hoja_vida->getRealPath(),$ruta.$nombrehoja_vida);

            $autoridad->hoja_vida = $nombrehoja_vida;
        };
      /*   Sube la foto de la autoridad  */
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/autoridades/");
           
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $autoridad->foto = $nombrefoto;
        };
        
        $autoridad->save();
        return redirect()->route('admin.autoridades.index')-> with('info', 'Autoridad Creado correctamente');;
    
    }

   
    public function show($id)
    {
        return view('admin.autoridades.show' , compact('autoridad'));
    }

    
    public function edit($id)
    {
        $autoridade = Autoridad::findOrFail($id);
        $tipo_autoridad = TipoAutoridad::pluck('descripcion', 'id');
        return view('admin.autoridades.edit' , compact('autoridade', 'tipo_autoridad'));
  
    }

    
    public function update(Request $request, $id)
    {
        $autoridade = Autoridad::findOrFail($id);

        $request->validate([
            'nombre' => 'required'
        ]);

        $autoridade->update($request->all()); 
        $autoridade->nombre = $request->nombre;   
       

        /* sube la hoja de vida de la autoridad */
        if ($request->hasFile("hoja_vida")){
            
            $hoja_vida = $request->file("hoja_vida");
            $nombrehoja_vida = Str::slug($request->nombre).".".$hoja_vida->guessExtension();
            $ruta = public_path("docs/autoridades/");

            
            copy($hoja_vida->getRealPath(),$ruta.$nombrehoja_vida);

            $autoridade->hoja_vida = $nombrehoja_vida;
        };
        
        /* sube la foto de la autoridad */
        
        
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/autoridades/");

            
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $autoridade->foto = $nombrefoto;
        };
        
        $autoridade->save();
        
        return redirect()->route('admin.autoridades.index')-> with('info', 'Datos Actualizados correctamente');
   
    }

    
    public function destroy($id)
    {
        $autoridade = Autoridad::findOrFail($id);
        // Obtén la ruta completa del archivo
        $rutaImagen = public_path("img/autoridades/{$autoridade->foto}");

        // Verifica si el archivo existe antes de intentar eliminarlo
        if (file_exists($rutaImagen)) {
            // Elimina el archivo físicamente
            unlink($rutaImagen);
        }
        // Elimina el registro de la base de datos

        $autoridade->delete();

        return redirect()->route('admin.autoridades.index')-> with('eliminar', 'ok');

    }
}
