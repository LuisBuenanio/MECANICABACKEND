<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoAutoridad;

class TipoAutoridadController extends Controller
{
    
    public function __construct()
    {
        $this-> middleware('can:admin.tipoautoridad.index')->only('index');
        $this-> middleware('can:admin.tipoautoridad.create')->only('create', 'store');        
        $this-> middleware('can:admin.tipoautoridad.edit')->only('edit', 'update');
        $this-> middleware('can:admin.tipoautoridad.destroy')->only('destroy');
    }

    public function index()
    {
        $tipo_autoridades = TipoAutoridad::all();
        return view('admin.tipoautoridad.index', compact('tipo_autoridades'));
    }

    
    public function create()
    {
        return view('admin.tipoautoridad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:tipo_autoridad'
        ]);

        TipoAutoridad::create($request->all());
        return redirect()->route('admin.tipoautoridad.index')-> with('info', 'Tipo de Autoridad Actualizado correctamente');;;
    }

        
    public function edit(TipoAutoridad $tipoautoridad)
    {
        return view('admin.tipoautoridad.edit' , compact('tipoautoridad'));
    }

    
    public function update(Request $request,TipoAutoridad $tipoautoridad)
    {
        $request->validate([
            'descripcion' => "required|unique:tipo_autoridad,descripcion,$tipoautoridad->id"
        ]);

        $tipoautoridad->update($request->all());
        return redirect()->route('admin.tipoautoridad.index')-> with('info', 'Tipo de Autoridad Actualizado correctamente');;
    
    }

    public function destroy(TipoAutoridad $tipoautoridad)
    {
        $tipoautoridad->delete();

        return redirect()->route('admin.tipoautoridad.index')-> with('eliminar', 'ok');
   
    }
}
