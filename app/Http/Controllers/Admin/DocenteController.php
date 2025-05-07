<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Str;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.docentes.index')->only('index');
        $this-> middleware('can:admin.docentes.create')->only('create', 'store');        
        $this-> middleware('can:admin.docentes.edit')->only('edit', 'update');
        $this-> middleware('can:admin.docentes.destroy')->only('destroy');
    }
    public function index()
    {
        $docentes = Docente::all();
        return view('admin.docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('admin.docentes.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $docente = Docente::create($request->all());
        
        $docente->nombre = $request->nombre;  
        
        /* sube la hoja de vida del docente */
        if ($request->hasFile("hoja_vida")){
            
            $hoja_vida = $request->file("hoja_vida");
            $nombrehoja_vida = Str::slug($request->nombre).".".$hoja_vida->guessExtension();
            $ruta = public_path("docs/docentes/");

            /* $logo_escuela->move($ruta,$nombrelogo_escuela); */
            copy($hoja_vida->getRealPath(),$ruta.$nombrehoja_vida);

            $docente->hoja_vida = $nombrehoja_vida;
        };

      
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/docentes/");
           
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $docente->foto = $nombrefoto;
        };
        
        $docente->save();
        return redirect()->route('admin.docentes.index')-> with('info', 'Docente Creado correctamente');;
    
    }

    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('admin.docentes.edit' , compact('docente'));
  
    }

    
    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $request->validate([
            'nombre' => 'required'
        ]);

        $docente->update($request->all()); 
        $docente->nombre = $request->nombre;   
       

        
        if ($request->hasFile("hoja_vida")){
            
            $hoja_vida = $request->file("hoja_vida");
            $nombrehoja_vida = Str::slug($request->nombre).".".$hoja_vida->guessExtension();
            $ruta = public_path("docs/docentes/");

            
            copy($hoja_vida->getRealPath(),$ruta.$nombrehoja_vida);

            $docente->hoja_vida = $nombrehoja_vida;
        };
        
        
        
        
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/docentes/");

            
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $docente->foto = $nombrefoto;
        };
        
        $docente->save();
        
        return redirect()->route('admin.docentes.index')-> with('info', 'Datos Actualizados correctamente');
   
    }

    
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);

        // Eliminar Foto
        $rutaImagen = public_path("img/docentes/{$docente->foto}");
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        // Eliminar Hoja Vida
        $rutaHoja = public_path("docs/docentes/{$docente->hoja_vida}");
        if (file_exists($rutaHoja)) {
            unlink($rutaHoja);
        }

        $docente->delete();

        return redirect()->route('admin.docentes.index')-> with('eliminar', 'ok');

    }

}
