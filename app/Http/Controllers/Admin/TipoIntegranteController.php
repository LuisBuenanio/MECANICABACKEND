<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoIntegrante;

class TipoIntegranteController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.tipointegrantes.index')->only('index');
        $this-> middleware('can:admin.tipointegrantes.create')->only('create', 'store');        
        $this-> middleware('can:admin.tipointegrantes.edit')->only('edit', 'update');
        $this-> middleware('can:admin.tipointegrantes.destroy')->only('destroy');
    }

    public function index()
    {
        $tipo_integrantes = TipoIntegrante::all();
        return view('admin.tipointegrantes.index', compact('tipo_integrantes'));
    }

    public function create()
    {
        return view('admin.tipointegrantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:tipo_integrante'
        ]);

       TipoIntegrante::create($request->all());
        return redirect()->route('admin.tipointegrantes.index')-> with('info', 'Tipo de Integrante Creado correctamente');;;
    }

    public function show($id)
    {
        $tipointegrante = TipoIntegrante::findOrFail($id);
        return view('admin.tipointegrantes.show' , compact('tipointegrante'));
    }

    public function edit($id)
    {
        $tipointegrante = TipoIntegrante::findOrFail($id);
        return view('admin.tipointegrantes.edit' , compact('tipointegrante'));
    }

    public function update(Request $request, $id)
    {
        $tipointegrante = TipoIntegrante::findOrFail($id);
        $request->validate([
            'descripcion' => "required|unique:tipo_integrante,descripcion,$tipointegrante->id"
        ]);

        $tipointegrante->update($request->all());
        return redirect()->route('admin.tipointegrantes.index')-> with('info', 'Tipo de Integrante Actualizado correctamente');
    }

   
    public function destroy($id)
    {
        $tipointegrante = TipoIntegrante::findOrFail($id);
        $tipointegrante->delete();

        return redirect()->route('admin.tipointegrantes.index')-> with('eliminar', 'ok');
    }
}
