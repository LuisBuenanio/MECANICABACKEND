<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Titulacion;
use App\Models\TipoTitulacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TitulacionController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.titulacion.index')->only('index');       
        $this-> middleware('can:admin.titulacion.edit')->only('edit', 'update');
    }

    public function index()
    {
        $titulaciones = Titulacion::all();
        return view('admin.titulacion.index', compact('titulaciones'));
    }

    
    public function create()
    {
        // 
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Titulacion $titulacion)
    {
        //
    }

    public function edit(Titulacion $titulacion)
    {
        return view('admin.titulacion.edit' , compact('titulacion'));
    }

    
    public function update(Request $request, Titulacion $titulacion)
    {
        $request->validate([
            'descripciont' => 'required',
            'resumen' => 'required',

        ]);

        $titulacion->update($request->all());

        $nombreOriginal = $request->descripciont;
        $slug = Str::slug($nombreOriginal);
        $nombreCorto = implode('-', array_slice(explode('-', $slug), 0, 2));          
        
        if ($request->hasFile("portada")){
            
            $portada = $request->file("portada");
            $nombreportada = $nombreCorto . "." . $portada->getClientOriginalExtension();
            $ruta = public_path("img/titulacion/");

            /* $portada->move($ruta,$descripciontportada); */
            copy($portada->getRealPath(),$ruta.$nombreportada);

            $titulacion->portada = $nombreportada;
        };
        
        $titulacion->save();        
        
        return redirect()->route('admin.titulacion.index')-> with('info', 'Datos de titulacion Actualizados correctamente');;
    
    }

    
    public function destroy(Titulacion $titulacion)
    {
        //
    }
}
