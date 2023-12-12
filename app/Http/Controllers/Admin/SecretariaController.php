<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Secretaria;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
class SecretariaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.secretaria.index')->only('index');       
        $this-> middleware('can:admin.secretaria.edit')->only('edit', 'update');
    }
    public function index()
    {
        $secretarias = Secretaria::all();
        return view('admin.secretaria.index', compact('secretarias'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secretaria = Secretaria::findOrFail($id);
        return view('admin.secretaria.edit' , compact('secretaria'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::findOrFail($id);
        $request->validate([
            'nombre_secretaria' => 'required',
            'telefono_secretaria' => 'required',
            'email_secretaria' => 'required',         
            'nombre_documento' => 'required',
            'detalle_documento' => 'required',


        ]);

        $secretaria->update($request->all());

        $secretaria->nombre_documento = $request->nombre_documento;  

        
        
        $secretaria->nombre_secretaria = $request->nombre_secretaria; 

        /* sube la foto de la autoridad */
        
        
        if ($request->hasFile("foto_secretaria")){
            
            $foto_secretaria = $request->file("foto_secretaria");
            $nombrefoto = Str::slug($request->nombre_secretaria).".".$foto_secretaria->guessExtension();
            $ruta = public_path("img/secretaria/");

            
            copy($foto_secretaria->getRealPath(),$ruta.$nombrefoto);

            $secretaria->foto_secretaria = $nombrefoto;
        };



        /* sube la hoja de vida de la autoridad */
        if ($request->hasFile("documento")){
            
            $documento = $request->file("documento");
            $descripciondocumento = Str::slug($request->nombre_documento).".".$documento->guessExtension();
            $ruta = public_path("docs/secretaria/");

            
            copy($documento->getRealPath(),$ruta.$descripciondocumento);

            $secretaria->documento = $descripciondocumento;
        };
        
        $secretaria->save();        
        
        return redirect()->route('admin.secretaria.index')-> with('info', 'Datos de secretaria Actualizados correctamente');;
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
