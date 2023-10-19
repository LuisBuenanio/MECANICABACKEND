<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function docentest()
    {
         return view('docentes.docentes');
    }
}
