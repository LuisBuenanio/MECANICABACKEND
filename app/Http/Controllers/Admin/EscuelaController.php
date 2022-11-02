<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EscuelaRequest;
Use App\Models\Escuela;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class EscuelaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.escuela.index')->only('index');       
        $this-> middleware('can:admin.escuela.edit')->only('edit', 'update');
    }
    
     public function index()
    {
        $escuelas = Escuela::all();
        return view('admin.escuela.index', compact('escuelas'));
    }

     public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }

    
    public function edit(Escuela $escuela)
    {
        return view('admin.escuela.edit', compact('escuela'));
    }

    public function update(Request $request, Escuela $escuela)
    {
        $request->validate([
            'nombre' => 'required',
            'mision' => 'required',
            'vision' => 'required'

        ]);
        
        $escuela->update($request->all());  
        

        /*  Actualizar el logo de la escuela */
        $escuela->nombre = $request->nombre;


        if ($request->hasFile("malla")){
            
            $malla = $request->file("malla");
            $nombremalla = Str::slug($request->nombre).".".$malla->guessExtension();
            $ruta = public_path("docs/escuela/");

            /* $logo_escuela->move($ruta,$nombrelogo_escuela); */
            copy($malla->getRealPath(),$ruta.$nombremalla);

            $escuela->malla = $nombremalla;
        };

       /*  Actualizar el logo de la escuela */
        /* $escuela->nombre = $request->nombre; */


        if ($request->hasFile("logo_escuela")){
            
            $logo_escuela = $request->file("logo_escuela");
            $nombrelogo_escuela = Str::slug($request->nombre).".".$logo_escuela->guessExtension();
            $ruta = public_path("img/escuela/");

            /* $logo_escuela->move($ruta,$nombrelogo_escuela); */
            copy($logo_escuela->getRealPath(),$ruta.$nombrelogo_escuela);

            $escuela->logo_escuela = $nombrelogo_escuela;
        };
        
        $escuela->save();
        
        Cache::flush();
        return redirect()->route('admin.escuela.index')-> with('info', 'Datos de Escuela Actualizados correctamente');
    }

    public function destroy(Escuela $escuela)
    {
        //

    }
}
