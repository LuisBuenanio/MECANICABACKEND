<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asociacion;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class AsociacionController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.asociacion.index')->only('index');       
        $this-> middleware('can:admin.asociacion.edit')->only('edit', 'update');
    }


    public function index()
    {
        $asociaciones = Asociacion::all();
        return view('admin.asociacion.index', compact('asociaciones'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Asociacion $asociacion)
    {
        return view('admin.asociacion.edit' , compact('asociacion'));
    }

    
    public function update(Request $request, Asociacion $asociacion)
    {
        $request->validate([
            'nombre' => 'required',
            'mision' => 'required',
            'vision' => 'required'

        ]);

        $asociacion->update($request->all());
        $asociacion->nombre = $request->nombre;  
        
        if ($request->hasFile("logo")){
            
            $logo = $request->file("logo");
            $nombrelogo = Str::slug($request->nombre).".".$logo->guessExtension();
            $ruta = public_path("img/asociacion/");

            /* $logo->move($ruta,$nombrelogo); */
            copy($logo->getRealPath(),$ruta.$nombrelogo);

            $asociacion->logo = $nombrelogo;
        };
        
        $asociacion->save();
        
        Cache::flush();
        return redirect()->route('admin.asociacion.index')-> with('info', 'Datos de Asociacion Actualizada correctamente');;
    
    }

    
    public function destroy($id)
    {
        //
    }
}
