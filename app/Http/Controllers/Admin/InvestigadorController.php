<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investigador;
use App\Http\Requests\InvestigadorRequest;
use App\Models\TipoInvestigador;

class InvestigadorController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.investigador.index')->only('index');
        $this-> middleware('can:admin.investigador.create')->only('create', 'store');        
        $this-> middleware('can:admin.investigador.edit')->only('edit', 'update');
        $this-> middleware('can:admin.investigador.destroy')->only('destroy');
    }

    public function index()
    {
        $investigadores = Investigador::all();
        return view('admin.investigador.index', compact('investigadores'));
    }

    
    public function create()
    {
        $tipo_investigador = TipoInvestigador::pluck('descripcion', 'id');
        
        return view('admin.investigador.create', compact('tipo_investigador'));
 
    }

    public function lista()
    {
        $investigadores = Investigador::all(); // Suponiendo que tienes una tabla "investigadors" en la base de datos

        $investigadorList = [];
        foreach ($investigadores as $investigador) {
            $investigadorList[$investigador->id] = $investigador->nombre_completo;
        }

        return response()->json($investigadorList);
    }


    public function store(Request $request)
    {
        // Realiza las validaciones necesarias para los campos del formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'nullable',
            'tipo_investigador_id' => 'required',
        ]);

        // Crea una nueva instancia del modelo investigador y asigna los valores del formulario
        $investigador = new Investigador();
        $investigador->nombre = $request->input('nombre');
        $investigador->email = $request->input('email');
        $investigador->tipo_investigador_id = $request->input('tipo_investigador_id');

        // Intenta guardar el investigador en la base de datos
        try {
            $investigador->save();
        } catch (\Exception $e) {
            // Si ocurre un error, devuelve una respuesta de error
            return response()->json(['error' => 'Error al guardar el investigador'], 500);
        }

        // Si se guardó exitosamente, devuelve una respuesta con el ID del nuevo investigador
        return response()->json(['investigadorId' => $investigador->id], 200);
    }

    
    public function store1(InvestigadorRequest $request)
    {
        $investigador = Investigador::create($request->all());

        return redirect()->route('admin.investigador.index')-> with('info', 'Investigador Creado correctamente');;

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $investigador = Investigador::findOrFail($id);
        $tipo_investigador = TipoInvestigador::pluck('descripcion', 'id');
        return view('admin.investigador.edit' , compact('investigador', 'tipo_investigador'));
  
    }

    
    public function update(InvestigadorRequest $request, $id)
    {
        $investigador = Investigador::findOrFail($id);    
        $investigador->update($request->all());         
        
        $investigador->save();

        return redirect()->route('admin.investigador.index')-> with('info', 'Datos Actualizados correctamente');
 
    }

    public function destroy($id)
    {
        $investigador = Investigador::findOrFail($id);
        $investigador->delete();

        return redirect()->route('admin.investigador.index')-> with('eliminar', 'ok');
  
    }
}
