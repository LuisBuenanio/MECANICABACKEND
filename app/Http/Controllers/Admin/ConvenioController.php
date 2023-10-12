<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convenio;
use App\Http\Requests\ConvenioRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\TipoConvenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.convenio.index')->only('index');
        $this-> middleware('can:admin.convenio.create')->only('create', 'store');        
        $this-> middleware('can:admin.convenio.edit')->only('edit', 'update');
        $this-> middleware('can:admin.convenio.destroy')->only('destroy');
    }

    public function index()
    {
        $convenios = Convenio::all();
        return view('admin.convenio.index', compact('convenios'));
    }

    public function create()
    {
        $tipo_convenio = TipoConvenio::pluck('descripcion', 'id');
        
        return view('admin.convenio.create', compact('tipo_convenio'));
    }

    
    public function store(ConvenioRequest $request)
    {
        
        Convenio::create($request->all());
        
        Cache::flush();
        return redirect()->route('admin.convenio.index')-> with('info', 'Convenio Creado correctamente');;
  
    }

    public function edit(Convenio $convenio)
    {
        $tipo_convenio = TipoConvenio::pluck('descripcion', 'id');
        return view('admin.convenio.edit' , compact('convenio', 'tipo_convenio'));
    }

    public function update(ConvenioRequest $request, Convenio $convenio)
    {
        $convenio->update($request->all());
        
        Cache::flush();
        return redirect()->route('admin.convenio.index')-> with('info', 'Datos Actualizados correctamente');
 
    }

    
    public function destroy(Convenio $convenio)
    {
        $convenio->delete();

        Cache::flush();
        return redirect()->route('admin.convenio.index')-> with('eliminar', 'ok');
  
    }
}
