<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CalendarioController extends Controller
{
    public function calendario()
    {
        /* $eventos = Evento::all(); // Obtén todos los eventos desde la base de datos
 */
        $all_events = Evento::all();
        $todos_eventos = Evento::all();
        $events = [];

        foreach ($all_events   as $evento) {
            $events [] = [
                'title' => $evento->titulo,
                'description' => $evento->descripcion, 
                'start' => $evento->fecha_inicio,
                'end' => $evento->fecha_fin,   
            ];
        }


        return view('calendario.calendario', compact('events', 'todos_eventos'));
    }
}
