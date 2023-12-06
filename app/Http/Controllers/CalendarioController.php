<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CalendarioController extends Controller
{
    public function calendario()
    {
        $eventos = Evento::all(); // Obtén todos los eventos desde la base de datos

        return view('calendario.calendario', compact('eventos'));
    }
}
