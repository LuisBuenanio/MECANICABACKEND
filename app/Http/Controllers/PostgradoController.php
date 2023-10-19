<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostgradoController extends Controller
{
    public function postgradost()
    {
         return view('postgrados.postgrados');
    }
}
