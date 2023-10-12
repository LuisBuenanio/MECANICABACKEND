<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoConvenio;

class TipoConvenioController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.tipoconvenio.index')->only('index');
        $this-> middleware('can:admin.tipoconvenio.create')->only('create', 'store');        
        $this-> middleware('can:admin.tipoconvenio.edit')->only('edit', 'update');
        $this-> middleware('can:admin.tipoconvenio.destroy')->only('destroy');
    }

    public function index()
    {
        $tipo_convenios = TipoConvenio::all();
        return view('admin.tipoconvenio.index', compact('tipo_convenios'));
    }

    
    public function create()
    {
        return view('admin.tipoconvenio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:tipo_convenio'
        ]);

        TipoConvenio::create($request->all());
        return redirect()->route('admin.tipoconvenio.index')-> with('info', 'Tipo de Convenio Actualizado correctamente');
    }

    public function show(TipoConvenio $tipoconvenio)
    {
        return view('admin.tipoconvenio.show' , compact('tipoconvenio'));
    }
    
    public function edit(TipoConvenio $tipoconvenio)
    {
        return view('admin.tipoconvenio.edit' , compact('tipoconvenio'));
    }

    public function update(Request $request, TipoConvenio $tipoconvenio)
    {
        $request->validate([
            'descripcion' => "required|unique:tipo_convenio,descripcion,$tipoconvenio->id"
        ]);

        $tipoconvenio->update($request->all());
        return redirect()->route('admin.tipoconvenio.index')-> with('info', 'Tipo de Convenio Actualizado correctamente');
    }


    public function destroy(TipoConvenio $tipoconvenio)
    {
        $tipoconvenio->delete();

        return redirect()->route('admin.tipoconvenio.index')-> with('eliminar', 'ok');
    }
}
