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
        
        /* $tipos_investigadores = Investigador::all(); */
        $tipos_investigadores = TipoInvestigador::pluck('descripcion', 'id');
        
        $investigadores = Investigador::all();

        return view('admin.gruposinvestigacion.create', compact('tipos_investigadores','investigadores','lineasInvestigacion', 'programasInvestigacion'));

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
        
        $grupoInvestigacion->nombre_gr = $request->nombre_gr;  

            if ($request->hasFile("portada")){
                
                $portada = $request->file("portada");
                $nombreportada = Str::slug($request->nombre_gr).".".$portada->guessExtension();
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

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $grupoInvestigacion = GrupoInvestigacion::findOrFail($id);

        $lineasInvestigacion = LineaInvestigacion::all();
        $programasInvestigacion = ProgramaInvestigacion::all();       
        $tipos_investigadores = TipoInvestigador::pluck('descripcion', 'id');        
        $investigadores = Investigador::all();

        $programasInvestigacion = ProgramaInvestigacion::all();  
        
        
        $investigadoresGrupo = $grupoInvestigacion->investigadores()->get();   

        $investigadoresDisponibles = Investigador::all();
        $investigadoresSelect = ['' => 'Seleccione un Investigador'];
        foreach ($investigadoresDisponibles as $investigador) {
            $investigadoresSelect[$investigador->id] = $investigador->nombre_completo;
        }



        return view('admin.gruposinvestigacion.edit', compact('grupoInvestigacion', 'tipos_investigadores','investigadores','lineasInvestigacion', 'programasInvestigacion', 'investigadoresGrupo', 'investigadoresSelect'));

    }

    
    public function update(Request $request, $id)
    {

        $grupoInvestigacion = GrupoInvestigacion::findOrFail($id);

        $data = $request->validate([
            'nombre_gr' => 'required',   
            'codigo' => "required|unique:grupos_investigacion,codigo,$grupoInvestigacion->id"
        ]);


        $grupoInvestigacion->update($data);       
        

        if ($request->hasFile("portada")) {
            $portada = $request->file("portada");
            $nombrePortada = Str::slug($request->nombre_gr) . "." . $portada->guessExtension();
            $rutaPortada = public_path("img/grupos-investigacion/");

            // Eliminar la portada anterior si existe
            if ($grupoInvestigacion->portada && file_exists($rutaPortada . $grupoInvestigacion->portada) && is_file($rutaPortada . $grupoInvestigacion->portada)) {
                unlink($rutaPortada . $grupoInvestigacion->portada);
            }

            copy($portada->getRealPath(), $rutaPortada . $nombrePortada);

            $grupoInvestigacion->portada = $nombrePortada;
        }

        $grupoInvestigacion->save();
        

        // Manejar la subida de nuevas imágenes adicionales
        if ($request->hasFile("nuevas_images")) {
            foreach ($request->file("nuevas_images") as $imagen) {
                $nombreImagen = Str::random(10) . $imagen->getClientOriginalName();
                $rutaImagen = public_path("img/grupos-investigacion/galeria/");

                copy($imagen->getRealPath(), $rutaImagen . $nombreImagen);

                // Crear y asociar la nueva imagen a la noticia
                $grupoInvestigacion->galeria_imagenes()->create(['imagen_path' => $nombreImagen]);
            }
        }

        // Eliminar imágenes marcadas
        if ($request->has('eliminar_imagenes') && is_array($request->eliminar_imagenes)) {        
            foreach ($request->eliminar_imagenes as $imagenId) {
                // Encuentra la imagen por su ID y elimínala
                $imagen = $grupoInvestigacion->galeria_imagenes()->find($imagenId);
                if ($imagen) {
                    // Elimina la imagen del almacenamiento
                    unlink(public_path("img/grupos-investigacion/galeria/{$imagen->imagen_path}"));
                    // Elimina la entrada de la base de datos
                    $imagen->delete();
                }
            }

        }

        // Manejar la subida de nuevas imágenes adicionales
        if ($request->hasFile("imagenes")) {
            foreach ($request->file("imagenes") as $imagen) {
                $nombreImagen = Str::random(10) . $imagen->getClientOriginalName();
                $rutaImagen = public_path("img/grupos-investigacion/galeria/");

                copy($imagen->getRealPath(), $rutaImagen . $nombreImagen);

                // Crear y asociar la nueva imagen a la noticia
                $grupoInvestigacion->galeria_imagenes()->create(['imagen_path' => $nombreImagen]);
            }
        }




        // Actualizar relaciones existentes
        if ($request->filled('investigadores')) {
            // Actualizar investigadores
            $grupoInvestigacion->investigadores()->sync($request->input('investigadores'));
        }

        if ($request->filled('lineas_investigacion')) {
            // Actualizar líneas de investigación
            $grupoInvestigacion->lineasInvestigacion()->sync($request->input('lineas_investigacion'));
        }

        if ($request->filled('programas_investigacion')) {
            // Actualizar programas de investigación
            $grupoInvestigacion->programasInvestigacion()->sync($request->input('programas_investigacion'));
        }

        // Puedes agregar más relaciones aquí

        return redirect()->route('admin.gruposinvestigacion.index')->with('info', 'Grupo de investigación actualizado con éxito.');
    }


    
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
