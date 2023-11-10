<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrupoInvestigacionController extends Controller
{
    public function gruposinvestigaciones()
    {
         return view('gruposinvestigacion.gruposinvestigacion');
    }
}
