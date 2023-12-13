<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Str;
use App\Models\Evento;


class EventoController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.eventos.index')->only('index');
        $this-> middleware('can:admin.eventos.create')->only('create', 'store');        
        $this-> middleware('can:admin.eventos.edit')->only('edit', 'update');
        $this-> middleware('can:admin.eventos.destroy')->only('destroy');
    }
    
    public function index()
    {
        $eventos = Evento::all();
        return view('admin.eventos.index', compact('eventos'));
    }

    
    public function create()
    {
        return view('admin.eventos.create');
    }

    
    public function store(EventoRequest $request)
    {
       
        $evento = Evento::create($request->all());     
                   
        $evento->save();
        return redirect()->route('admin.eventos.index')-> with('info', 'Evento Creado correctamente');;
    
    
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('admin.eventos.edit' , compact('evento'));
    }

    public function update(EventoRequest $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $evento->update($request->all()); 
        
        
        $evento->save();
        
        return redirect()->route('admin.eventos.index')-> with('info', 'Datos Actualizados correctamente');
       
    }

    
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        $evento->delete();

        return redirect()->route('admin.eventos.index')-> with('eliminar', 'ok');

    }
}
