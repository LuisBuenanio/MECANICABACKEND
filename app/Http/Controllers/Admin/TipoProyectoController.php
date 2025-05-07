<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoProyecto;

class TipoProyectoController extends Controller
{
   
    public function __construct()
    {
        $this-> middleware('can:admin.tipoproyecto.index')->only('index');
        $this-> middleware('can:admin.tipoproyecto.create')->only('create', 'store');        
        $this-> middleware('can:admin.tipoproyecto.edit')->only('edit', 'update');
        $this-> middleware('can:admin.tipoproyecto.destroy')->only('destroy');
    }
    
    public function index()
    {
        $tipo_proyectos = TipoProyecto::all();
        return view('admin.tipoproyecto.index', compact('tipo_proyectos'));
    }
    public function create()
    {
        return view('admin.tipoproyecto.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:tipo_proyecto'
        ]);

        TipoProyecto::create($request->all());
        return redirect()->route('admin.tipoproyecto.index')-> with('info', 'Tipo de Proyecto Actualizado correctamente');
   
    }

    
    public function edit($id)
    {
        $tiproyecto = TipoProyecto::findOrFail($id);
        return view('admin.tipoproyecto.edit' , compact('tipoproyecto'));
    }

    public function update(Request $request, $id)
    {
        $tiproyecto = TipoProyecto::findOrFail($id);
        $request->validate([
            'descripcion' => "required|unique:tipo_convenio,descripcion,$tipoproyecto->id"
        ]);

        $tipoproyecto->update($request->all());
        return redirect()->route('admin.tipoproyecto.index')-> with('info', 'Tipo de Proyecto Actualizado correctamente');
    }


    public function destroy(TipoProyecto $id)
    {
        $tiproyecto = TipoProyecto::findOrFail($id);
        $tipoproyecto->delete();

        return redirect()->route('admin.tipoproyecto.index')-> with('eliminar', 'ok');
    }
}
