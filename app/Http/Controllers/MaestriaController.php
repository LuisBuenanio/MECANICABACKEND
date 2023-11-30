<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestria;
use Illuminate\Support\Facades\DB;

class MaestriaController extends Controller
{
    public function maestrias()
    {
        $maestrias = Maestria::where('estado', 2)->orderBy('nombre', 'ASC')
        ->paginate(9);
        return view('maestrias.maestrias', compact('maestrias'));

    }
    public function maestria(Maestria $maestria)
    {
       /*  $this->authorize('published', $docente); */
        return view('maestrias.maestria', compact('maestria'));
    }

}
