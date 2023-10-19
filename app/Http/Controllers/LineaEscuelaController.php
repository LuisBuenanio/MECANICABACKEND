<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LineaEscuelaController extends Controller
{
    public function lineasesct()
    {
         return view('lineasesc.lineasesc');
    }
}
