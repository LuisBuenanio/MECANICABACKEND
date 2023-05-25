<?php

namespace App\Http\Controllers;

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
}
