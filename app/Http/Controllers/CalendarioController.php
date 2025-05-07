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
        $eventosPublicados = Evento::where('estado',2)->get();

        
        $events = [];

        foreach ($eventosPublicados   as $evento) {
            $events [] = [
                'title' => $evento->titulo,
                'description' => $evento->descripcion, 
                'start' => $evento->fecha_inicio,
                'end' => $evento->fecha_fin,   
            ];
        }


        return view('calendario.calendario', compact('events', 'eventosPublicados'));
    }
}
