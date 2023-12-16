<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GrupoInvestigacion;
use App\Http\Requests\GrupoInvestigacionRequest;
use App\Models\GaleriaImagen;
use App\Models\Investigador;
use App\Models\LineaInvestigacion;
use App\Models\ProgramaInvestigacion;
use App\Models\TipoInvestigador;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



class GrupoInvestigacionController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.gruposinvestigacion.index')->only('index');
        $this-> middleware('can:admin.gruposinvestigacion.create')->only('create', 'store');        
        $this-> middleware('can:admin.gruposinvestigacion.edit')->only('edit', 'update');
        $this-> middleware('can:admin.gruposinvestigacion.destroy')->only('destroy');
    }
    
    public function index()
    {
        return view('admin.gruposinvestigacion.index');
    }

    
    public function create()
    {
        
        $lineasInvestigacion = LineaInvestigacion::all();
        $programasInvestigacion = ProgramaInvestigacion::all();
        
        $tiposInvestigadores = Investigador::all();
        
        $investigadores = Investigador::all();

        return view('admin.gruposinvestigacion.create', compact('tiposInvestigadores','investigadores','lineasInvestigacion', 'programasInvestigacion'));

    }
    // Controlador de Laravel
    public function obtenerProgramas(Request $request)
    {
        $lineasSeleccionadas = $request->input('lineas');

        // Aquí debes implementar la lógica para obtener los programas de la base de datos
        // según las líneas de investigación seleccionadas y devolverlos en formato JSON
        $programas = ProgramaInvestigacion::whereIn('linea_investigacion_id', $lineasSeleccionadas)->get();

        return response()->json($programas);
    }
    

    
    public function store(GrupoInvestigacionRequest $request)
    {
       

        // Crear un nuevo grupo de investigación
        $grupoInvestigacion = GrupoInvestigacion::create($request->all());
            
            // Agregar otros campos según sea necesario
        
        $grupoInvestigacion->nombre = $request->nombre;  

            if ($request->hasFile("portada")){
                
                $portada = $request->file("portada");
                $nombreportada = Str::slug($request->nombre).".".$portada->guessExtension();
                $ruta = public_path("img/grupos-investigacion/");
               
                /* $portada->move($ruta, $nombreportada); */
                copy($portada->getRealPath(),$ruta.$nombreportada);
    
                $grupoInvestigacion->portada = $nombreportada;
            };
            
            

         // Manejar la subida de imágenes adicionales
         if ($request->hasFile("galeria_imagenes")) {
            foreach ($request->file("galeria_imagenes") as $imagen) {
                $nombreImagen = Str::random(10). $imagen->getClientOriginalName();
                $rutaImagen = public_path("img/grupos-investigacion/galeria/");
                /* $imagen->move($rutaImagen, $nombreImagen); */
                copy($imagen->getRealPath(),$rutaImagen.$nombreImagen);

                // Crear y asociar la imagen a la noticia
                $grupoInvestigacion->galeria_imagenes()->create(['imagen_path' => $nombreImagen]);
            }
        }

        $grupoInvestigacion->save();

        if ($request->filled('investigadores')) {
                // Asociar líneas de investigación al grupo de investigación
            $grupoInvestigacion->investigadores()->attach($request->input('investigadores'));
        }

       

            // Verificar si se proporcionaron líneas de investigación y programas de investigación
        if ($request->filled('lineas_investigacion')) {
            // Asociar líneas de investigación al grupo de investigación
            $grupoInvestigacion->lineasInvestigacion()->attach($request->input('lineas_investigacion'));
        }


            // Verificar si se proporcionaron líneas de investigación y programas de investigación
        if ($request->filled('programas_investigacion')) {
                // Asociar líneas de investigación al grupo de investigación
            $grupoInvestigacion->programasInvestigacion()->attach($request->input('programas_investigacion'));
            
        }
        
      
        
        

        // Puedes agregar relaciones adicionales aquí

        return redirect()->route('admin.gruposinvestigacion.index')->with('info', 'Grupo de investigación creado con éxito.');
 
    }

    public function getProgramas(Request $request)
    {
        $lineasInvestigacion = $request->input('lineas_investigacion');
        
        // Obtener programas relacionados con las líneas seleccionadas
        $programasInvestigacion = ProgramaInvestigacion::whereIn('linea_investigacion_id', $lineasInvestigacion)->get();

        // Devolver la vista parcial con la lista de programas
        return view('grupos.partials.programas', compact('programasInvestigacion'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupoInvestigacion = GrupoInvestigacion::findOrFail($id);


        if (!is_null($grupoInvestigacion->galeria_imagenes)) {
            // Eliminar imágenes físicamente
            foreach ($grupoInvestigacion->galeria_imagenes as $imagen) {
                $rutaImagen = public_path("img/grupos-investigacion/galeria/{$imagen->imagen_path}");

                // Verificar si el archivo existe antes de intentar eliminarlo
                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }
            }
        }

        // Eliminar registros de imágenes en la base de datos
        $grupoInvestigacion->galeria_imagenes()->delete();



        $rutaPortada = public_path("img/grupos-investigacion/{$grupoInvestigacion->portada}");

        // Verifica si el archivo existe antes de intentar eliminarlo
        if (file_exists($rutaPortada) && is_file($rutaPortada)) {
            
            // Elimina el archivo físicamente
            unlink($rutaPortada);
        }
        // Elimina el registro de la base de datos

        $grupoInvestigacion->delete();

        return redirect()->route('admin.gruposinvestigacion.index')-> with('eliminar', 'ok');

  
    }
}
