<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Str;
use App\Models\Maestria;
use Illuminate\Http\Request;

class MaestriaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.maestrias.index')->only('index');
        $this-> middleware('can:admin.maestrias.create')->only('create', 'store');        
        $this-> middleware('can:admin.maestrias.edit')->only('edit', 'update');
        $this-> middleware('can:admin.maestrias.destroy')->only('destroy');
    }


    public function index()
    {
        $maestrias = Maestria::all();
        return view('admin.maestrias.index', compact('maestrias'));
        
    }

    
    public function create()
    {
        return view('admin.maestrias.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required'
        ]);

        $maestria = maestria::create($request->all());

        
        $maestria->nombre = $request->nombre;  
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/maestrias/");
           
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $maestria->foto = $nombrefoto;
        };
        

        /* sube la hoja de vida del maestria */
        if ($request->hasFile("malla")){
            
            $malla = $request->file("malla");
            $nombremalla = Str::slug($request->nombre).".".$malla->guessExtension();
            $ruta = public_path("docs/maestrias/");

            /* $logo_escuela->move($ruta,$nombrelogo_escuela); */
            copy($malla->getRealPath(),$ruta.$nombremalla);

            $maestria->malla = $nombremalla;
        };

      
        
        $maestria->save();
        return redirect()->route('admin.maestrias.index')-> with('info', 'Maestria Creada correctamente');;
    
    
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $maestria = Maestria::findOrFail($id);
        return view('admin.maestrias.edit' , compact('maestria'));
    }

    
    public function update(Request $request, $id)
    {
        $maestria = Maestria::findOrFail($id);

        $request->validate([
            'nombre' => 'required'
        ]);

        $maestria->update($request->all()); 
        $maestria->nombre = $request->nombre;   
       

        
        if ($request->hasFile("malla")){
            
            $malla = $request->file("malla");
            $nombremalla = Str::slug($request->nombre).".".$malla->guessExtension();
            $ruta = public_path("docs/maestrias/");

            
            copy($malla->getRealPath(),$ruta.$nombremalla);

            $maestria->malla = $nombremalla;
        };
        
        
        
        
        if ($request->hasFile("foto")){
            
            $foto = $request->file("foto");
            $nombrefoto = Str::slug($request->nombre).".".$foto->guessExtension();
            $ruta = public_path("img/maestrias/");

            
            copy($foto->getRealPath(),$ruta.$nombrefoto);

            $maestria->foto = $nombrefoto;
        };
        
        $maestria->save();
        
        return redirect()->route('admin.maestrias.index')-> with('info', 'Datos Actualizados correctamente');
  
    }

    
    public function destroy($id)
    {
        $maestria = Maestria::findOrFail($id);

        // Eliminar Foto
        $rutaImagen = public_path("img/maestrias/{$maestria->foto}");
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        // Eliminar Hoja Vida
        $rutaHoja = public_path("docs/maestrias/{$maestria->malla}");
        if (file_exists($rutaHoja)) {
            unlink($rutaHoja);
        }

        $maestria->delete();

        return redirect()->route('admin.maestrias.index')-> with('eliminar', 'ok');

    }
}
