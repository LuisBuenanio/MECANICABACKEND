<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaestriaController extends Controller
{
    public function maestriast()
    {
         return view('maestrias.maestrias');
    }
}
