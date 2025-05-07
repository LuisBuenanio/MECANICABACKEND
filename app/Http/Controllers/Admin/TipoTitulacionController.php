<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoTitulacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class TipoTitulacionController extends Controller

{
    public function __construct()
    {
        $this-> middleware('can:admin.tipotitulacion.index')->only('index');       
        $this-> middleware('can:admin.tipotitulacion.edit')->only('edit', 'update');
    }

    public function index()
    {
        $tipotitulaciones = TipoTitulacion::all();
        return view('admin.tipotitulacion.index', compact('tipotitulaciones'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

  
    
    public function show(TipoTitulacion $tipotitulacion)
    {
        //
    }

    
    public function edit(TipoTitulacion $tipotitulacion)
    {
        return view('admin.tipotitulacion.edit' , compact('tipotitulacion'));
    }

    
    public function update(Request $request, TipoTitulacion $tipotitulacion)
    {
        $request->validate([
            'descripcion' => 'required',

        ]);

        $tipotitulacion->update($request->all());
        $tipotitulacion->descripcion = $request->descripcion;   

        
        /* sube la hoja de vida de la autoridad */
        if ($request->hasFile("documento")){
            
            $documento = $request->file("documento");
            $descripciondocumento = Str::slug($request->descripcion).".".$documento->guessExtension();
            $ruta = public_path("docs/titulacion/tipos/");

            
            copy($documento->getRealPath(),$ruta.$descripciondocumento);

            $tipotitulacion->documento = $descripciondocumento;
        };

        
        $tipotitulacion->save();        
        
        return redirect()->route('admin.tipotitulacion.index')-> with('info', 'Datos de Tipos de titulacion Actualizados correctamente');;
    

    }

    
    public function destroy(TipoTitulacion $tipoTitulacion)
    {
        //
    }
}
