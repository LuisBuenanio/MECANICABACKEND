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
        $this-> middleware('can:admin.proyectos.index')->only('index');
        $this-> middleware('can:admin.proyectos.create')->only('create', 'store');        
        $this-> middleware('can:admin.proyectos.edit')->only('edit', 'update');
        $this-> middleware('can:admin.proyectos.destroy')->only('destroy');
    }
    
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('admin.proyectos.index', compact('proyectos'));
    }

    
    public function create()
    {
        $tipo_proyecto = TipoProyecto::pluck('descripcion', 'id');
        
        return view('admin.proyectos.create', compact('tipo_proyecto'));
    }

      public function store(ProyectoRequest $request)
    {
        $proyecto = Proyecto::create($request->all());

        return redirect()->route('admin.proyectos.index')-> with('info', 'Proyecto Creado correctamente');;

    }

    

   
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $tipo_proyecto = TipoProyecto::pluck('descripcion', 'id');
        return view('admin.proyectos.edit' , compact('proyecto', 'tipo_proyecto'));
    }

    public function update(ProyectoRequest $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);    
        $proyecto->update($request->all());         
        
        $proyecto->save();

        return redirect()->route('admin.proyectos.index')-> with('info', 'Datos Actualizados correctamente');
 
    }

    
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('admin.proyectos.index')-> with('eliminar', 'ok');
  
    }
}
