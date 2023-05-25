<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Escuela;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $escuela = Escuela::where('id', 1)
            ->select(
                'nombre',
                'mision',
                'vision',
                'telefono',
                'email',
                'mapa',
                'direccion',
                'malla',
                'duracion',
                'perfil',
                'campo',
                'titulo',
                'modalidad',
                'fecha_creacion',
                'logo_escuela'
            )
            ->first();
            $autoridades =   DB::table('autoridad')
            ->leftJoin('tipo_autoridad', 'autoridad.tipo_autoridad_id', '=', 'tipo_autoridad.id')
            ->select(
                'nombre',
                'telefono',
                'hoja_vida',
                'foto',
                'estado',
                'tipo_autoridad.descripcion'
            )
            ->get();
        $noticias = Noticia::where('estado', 2)->orderBy('fecha_publicacion', 'DESC')->take(3)->get();
        $sliders = Slider::where('estado', 2)->orderBy('id', 'DESC')->get();
        
        
        

        return view('inicio', compact('noticias','sliders','escuela','autoridades'));
    }

    /* public function galerias(){

        $galerias = Galeria::where('estado',2)
        ->select(
            'nombre'           
        )
        ->first();
        return view('galerias.galerias', compact('galerias'));
    } */

    
}
