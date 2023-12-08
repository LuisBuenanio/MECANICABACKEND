<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this-> middleware('can:admin.slider.index')->only('index');
        $this-> middleware('can:admin.slider.create')->only('create', 'store');        
        $this-> middleware('can:admin.slider.edit')->only('edit', 'update');
        $this-> middleware('can:admin.slider.destroy')->only('destroy');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    
    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'estado' => 'required|in:1,2',
            's_imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider = Slider::create($request->all());
        
        $slider->name = $request->name;  
        
        
      /*   Sube la foto de la autoridad  */
        if ($request->hasFile("s_imagen")){
            
            $s_imagen = $request->file("s_imagen");
            $names_imagen = Str::slug($request->name).".".$s_imagen->guessExtension();
            $ruta = public_path("img/slider/");
            
           copy($s_imagen->getRealPath(),$ruta.$names_imagen);

            $slider->s_imagen = $names_imagen;
        };
        
        $slider->save();

        return redirect()->route('admin.slider.index')->with('info', 'Imagen de Slider creada exitosamente.');
    }

    public function edit($id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();
        return view('admin.slider.edit', compact('slider'));
    }

    
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'name' => 'required',            
            'estado' => 'required|in:1,2',
        ]);

        $slider->estado = $request->estado;  

        $slider->name = $request->name;  

        /*   Sube la foto de la autoridad  */
        if ($request->hasFile("s_imagen")){
              
            $s_imagen = $request->file("s_imagen");
            $names_imagen = Str::slug($request->name).".".$s_imagen->guessExtension();
            $ruta = public_path("img/slider/");

            $s_imagen->move($ruta,$names_imagen);
           

            $slider->s_imagen = $names_imagen;
        };
       
        $slider->save();

        return redirect()->route('admin.slider.index')->with('info', 'Imagen de Slider actualizado exitosamente.');
    }

  
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Obtén la ruta completa del archivo
        $rutaImagen = public_path("img/slider/{$slider->s_imagen}");

        // Verifica si el archivo existe antes de intentar eliminarlo
        if (file_exists($rutaImagen)) {
            // Elimina el archivo físicamente
            unlink($rutaImagen);
        }
        // Elimina el registro de la base de datos
        $slider->delete();       

        return redirect()->route('admin.slider.index')->with('eliminar', 'ok');
    }

}
