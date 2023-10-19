<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LineaFacultadController extends Controller
{
    public function lineasfact()
    {
         return view('lineasfac.lineasfac');
    }
}
