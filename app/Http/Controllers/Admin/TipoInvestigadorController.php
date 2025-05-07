<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoInvestigador;

class TipoInvestigadorController extends Controller
{
   
    public function __construct()
    {
        $this-> middleware('can:admin.tipoinvestigador.index')->only('index');
        $this-> middleware('can:admin.tipoinvestigador.create')->only('create', 'store');        
        $this-> middleware('can:admin.tipoinvestigador.edit')->only('edit', 'update');
        $this-> middleware('can:admin.tipoinvestigador.destroy')->only('destroy');
    }
    
    public function index()
    {
        $tipo_investigadores = TipoInvestigador::all();
        return view('admin.tipoinvestigador.index', compact('tipo_investigadores'));
    }
    public function create()
    {
        return view('admin.tipoinvestigador.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:tipo_investigador'
        ]);

        TipoInvestigador::create($request->all());
        return redirect()->route('admin.tipoinvestigador.index')-> with('info', 'Tipo de Investigador Actualizado correctamente');
   
    }

    
    public function edit($id)
    {
        $tipoinvestigador = TipoInvestigador::findOrFail($id);
        return view('admin.tipoinvestigador.edit' , compact('tipoinvestigador'));
    }

    public function update(Request $request, $id)
    {
        $tipoinvestigador = TipoInvestigador::findOrFail($id);
        $request->validate([
            'descripcion' => "required|unique:tipo_investigador,descripcion,$tipoinvestigador->id"
        ]);

        $tipoinvestigador->update($request->all());
        return redirect()->route('admin.tipoinvestigador.index')-> with('info', 'Tipo de Investigador Actualizado correctamente');
    }


    public function destroy($id)
    {
        $tipoinvestigador = Tipoinvestigador::findOrFail($id);
        $tipoinvestigador->delete();

        return redirect()->route('admin.tipoinvestigador.index')-> with('eliminar', 'ok');
    }
}
