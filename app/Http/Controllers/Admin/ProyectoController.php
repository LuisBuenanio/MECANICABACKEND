<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Proyecto;
use App\Http\Requests\ProyectoRequest;
use App\Models\TipoProyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    
    public function __construct()
    {
        $this-> middleware('can:admin.proyecto.index')->only('index');
        $this-> middleware('can:admin.proyecto.create')->only('create', 'store');        
        $this-> middleware('can:admin.proyecto.edit')->only('edit', 'update');
        $this-> middleware('can:admin.proyecto.destroy')->only('destroy');
    }
    
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('admin.proyecto.index', compact('proyectos'));
    }

    
    public function create()
    {
        $tipo_proyecto = TipoProyecto::pluck('descripcion', 'id');
        
        return view('admin.proyecto.create', compact('tipo_proyecto'));
    }

      public function store(ProyectoRequest $request)
    {
        Proyecto::create($request->all());
        
        Cache::flush();
        return redirect()->route('admin.proyecto.index')-> with('info', 'Proyecto Creado correctamente');;

    }

    

   
    public function edit(Proyecto $proyecto)
    {
        $tipo_proyecto = TipoProyecto::pluck('descripcion', 'id');
        return view('admin.proyecto.edit' , compact('proyecto', 'tipo_proyecto'));
    }

    public function update(ProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());
        
        Cache::flush();
        return redirect()->route('admin.proyecto.index ')-> with('info', 'Datos Actualizados correctamente');
 
    }

    
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        Cache::flush();
        return redirect()->route('admin.proyecto.index')-> with('eliminar', 'ok');
  
    }
}
