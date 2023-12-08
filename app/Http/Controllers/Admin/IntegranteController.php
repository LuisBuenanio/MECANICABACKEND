<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asociacion;
use Illuminate\Http\Request;

use App\Models\TipoIntegrante;
use App\Models\Integrante;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class IntegranteController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.integrantes.index')->only('index');
        $this-> middleware('can:admin.integrantes.create')->only('create', 'store');        
        $this-> middleware('can:admin.integrantes.edit')->only('edit', 'update');
        $this-> middleware('can:admin.integrantes.destroy')->only('destroy');
    }
    public function index()
    {
        $integrantes = Integrante::all();
        return view('admin.integrantes.index', compact('integrantes'));
    }

   
    public function create()
    {
        $tipo_integrante = TipoIntegrante::pluck('descripcion', 'id');
        $asociacion = Asociacion::pluck('nombre', 'id');
        return view('admin.integrantes.create', compact('tipo_integrante', 'asociacion'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $integrante = Integrante::create($request->all());
        /* $integrante = new Integrante(); */
        $integrante->nombre = $request->nombre;  
        
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/asociacion/integrantes/");

            /* $foto->move($ruta,$nombrefoto); */
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $integrante->foto = $nombrefoto;
        };
        
        $integrante->save();
        return redirect()->route('admin.integrantes.index')-> with('info', 'Integrante Creado correctamente');;
    }

    
    public function show($id)
    {
        return view('admin.integrantes.show' , compact('integrante'));
    }

    
    public function edit($id)
    {
        $integrante = Integrante::findOrFail($id);

        $tipo_integrante = TipoIntegrante::pluck('descripcion', 'id');
        $asociacion = Asociacion::pluck('nombre', 'id');
        return view('admin.integrantes.edit' , compact('integrante', 'tipo_integrante', 'asociacion'));
    }

    
    public function update(Request $request, $id)
    {
        $integrante = Integrante::findOrFail($id);

        $request->validate([
            'nombre' => 'required'
        ]);

        $integrante->update($request->all());  
        /* $integrante = new Integrante(); */
        $integrante->nombre = $request->nombre;  
        
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/asociacion/integrantes/");

            /* $foto->move($ruta,$nombrefoto); */
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $integrante->foto = $nombrefoto;
        };
        
        $integrante->save();
        
        return redirect()->route('admin.integrantes.index')-> with('info', 'Datos Actualizados correctamente');
   
    }

    
    public function destroy($id)
    {
        $integrante = Integrante::findOrFail($id);
        
        $rutaImagen = public_path("img/asociacion/integrantes/{$integrante->foto}");

        // Verifica si el archivo existe antes de intentar eliminarlo
        if (file_exists($rutaImagen)) {
            // Elimina el archivo físicamente
            unlink($rutaImagen);
        }
        // Elimina el registro de la base de datos

        $integrante->delete();

        return redirect()->route('admin.integrantes.index')-> with('eliminar', 'ok');

    }
}
