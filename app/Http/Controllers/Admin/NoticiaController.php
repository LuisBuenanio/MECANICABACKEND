<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Http\Requests\NoticiaRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class NoticiaController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.noticias.index')->only('index');
        $this-> middleware('can:admin.noticias.create')->only('create', 'store');        
        $this-> middleware('can:admin.noticias.edit')->only('edit', 'update');
        $this-> middleware('can:admin.noticias.destroy')->only('destroy');
    }
    
     public function index()
    {
        return view('admin.noticias.index');

    }

     public function create()
    {
        return view('admin.noticias.create');
    }
   
    public function store(NoticiaRequest $request)
    {
        $data = $request->validated();
        
            // Verificar si 'entradilla' está presente en $data antes de acceder a ella
        $data['entradilla'] = isset($data['entradilla']) ? strip_tags($data['entradilla']) : null;

        // Verificar si 'contenido' está presente en $data antes de acceder a ella
        $data['contenido'] = isset($data['contenido']) ? strip_tags($data['contenido']) : null;

        $noticia = Noticia::create($data);

        $noticia->titulo = $request->titulo;  

        if ($request->hasFile("portada")){
            
            $portada = $request->file("portada");
            $nombreportada = Str::slug($request->titulo).".".$portada->guessExtension();
            $ruta = public_path("img/noticias/portadas/");
           
            /* $portada->move($ruta, $nombreportada); */
            copy($portada->getRealPath(),$ruta.$nombreportada);

            $noticia->portada = $nombreportada;
        };
        
        $noticia->save();

         // Manejar la subida de imágenes adicionales
        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $imagen) {
                $nombreImagen = Str::random(10). $imagen->getClientOriginalName();
                $rutaImagen = public_path("img/noticias/imagenes/");
                /* $imagen->move($rutaImagen, $nombreImagen); */
                copy($imagen->getRealPath(),$rutaImagen.$nombreImagen);

                // Crear y asociar la imagen a la noticia
                $noticia->images()->create(['image_path' => $nombreImagen]);
            }
        }
 
        return redirect()->route('admin.noticias.index')->with('info', 'Noticia creada correctamente');
    }


     

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        
        $noticia = Noticia::findOrFail($id);

        $data = $request->validate([
            'titulo' => 'required',
            'slug' => 'required|unique:noticias,slug,' .$noticia->id,            
            'estado' => 'required|in:1,2',
            // Resto de las reglas
        ]);
         
        $noticia->update($data);

        // Actualizar la portada si se proporciona un nuevo archivo
        if ($request->hasFile("portada")) {
            $portada = $request->file("portada");
            $nombrePortada = Str::slug($request->titulo) . "." . $portada->guessExtension();
            $rutaPortada = public_path("img/noticias/portadas/");

            // Eliminar la portada anterior si existe
            if ($noticia->portada && file_exists($rutaPortada . $noticia->portada) && is_file($rutaPortada . $noticia->portada)) {
                unlink($rutaPortada . $noticia->portada);
            }

            copy($portada->getRealPath(), $rutaPortada . $nombrePortada);

            $noticia->portada = $nombrePortada;
        }

        // Manejar la subida de nuevas imágenes adicionales
        if ($request->hasFile("nuevas_images")) {
            foreach ($request->file("nuevas_images") as $imagen) {
                $nombreImagen = Str::random(10) . $imagen->getClientOriginalName();
                $rutaImagen = public_path("img/noticias/imagenes/");

                copy($imagen->getRealPath(), $rutaImagen . $nombreImagen);

                // Crear y asociar la nueva imagen a la noticia
                $noticia->images()->create(['image_path' => $nombreImagen]);
            }
        }

        $noticia->save();

        // Eliminar imágenes marcadas
        if ($request->has('eliminar_imagenes') && is_array($request->eliminar_imagenes)) {        
            foreach ($request->eliminar_imagenes as $imagenId) {
                // Encuentra la imagen por su ID y elimínala
                $imagen = $noticia->images()->find($imagenId);
                if ($imagen) {
                    // Elimina la imagen del almacenamiento
                    unlink(public_path("img/noticias/imagenes/{$imagen->image_path}"));
                    // Elimina la entrada de la base de datos
                    $imagen->delete();
                }
            }
        }

        // Manejar la subida de nuevas imágenes adicionales
        if ($request->hasFile("imagenes")) {
            foreach ($request->file("imagenes") as $imagen) {
                $nombreImagen = Str::random(10) . $imagen->getClientOriginalName();
                $rutaImagen = public_path("img/noticias/imagenes/");

                copy($imagen->getRealPath(), $rutaImagen . $nombreImagen);

                // Crear y asociar la nueva imagen a la noticia
                $noticia->images()->create(['image_path' => $nombreImagen]);
            }
        }
        return redirect()->route('admin.noticias.index')-> with('info', 'Noticia Actualizada correctamente');
    }   



    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Eliminar imágenes físicamente
        foreach ($noticia->images as $imagen) {
            $rutaImagen = public_path("img/noticias/imagenes/{$imagen->image_path}");

            // Verificar si el archivo existe antes de intentar eliminarlo
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
        }

        // Eliminar registros de imágenes en la base de datos
        $noticia->images()->delete();

        // Eliminar la portada físicamente
        $rutaPortada = public_path("img/noticias/portadas/{$noticia->portada}");

        // Verificar si la portada existe antes de intentar eliminarla
        if (file_exists($rutaPortada) && is_file($rutaPortada)) {
            unlink($rutaPortada);
        }

        // Eliminar el registro de la noticia
        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('info', 'Noticia eliminada correctamente');
    }
}