<?php

/* namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return response()->json(['datos'=>Slider::all()]);
    }

    public function show($id)
    {
        $slider=Slider::find($id);
        if(!$slider){
            return response()->json(['mensaje'=>'No se encontro la slider'],404);
        }
        return response()->json(['datos'=>$slider],202);
    }
} */

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $filteredSliders = $sliders->where('estado', 2);
        
        // Transformar los datos para incluir las URLs completas de las imágenes
        $imageData = $filteredSliders->map(function ($slider) {
            return [
                'name' => $slider->name,
                'estado' => $slider->estado,
                'url' => $this->generateImageUrl($slider->s_imagen),
                'created_at' => $slider->created_at,
                'updated_at' => $slider->updated_at,
            ];
        });

        return response()->json(['datos' => $imageData]);
    }

    public function show($id)
    {
        $slider = Slider::where('id', $id)
            ->where('estado', 2)
            ->first();

        if (!$slider) {
            return response()->json(['mensaje' => 'No se encontró el slider'], 404);
        }

        // Incluir la URL completa de la imagen en la respuesta
        $responseData = [
            'name' => $slider->name,
            'estado' => $slider->estado,
            'url' => $this->generateImageUrl($slider->s_imagen),
            'created_at' => $slider->created_at,
            'updated_at' => $slider->updated_at,
        ];

        return response()->json(['datos' => $responseData], 202);
    }

    private function generateImageUrl($imageName)
    {
        // Aquí debes construir la URL completa de la imagen basándote en la lógica de almacenamiento en tu aplicación
        // Por ejemplo, si las imágenes se almacenan en una carpeta 'public/images/sliders', podrías hacer algo como esto:
        return asset('img/slider/' . $imageName);
    }
}
