<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretaria;
use Illuminate\Support\Facades\DB;

class SecretariaController extends Controller
{
    public function secretaria()
    {
        $secretaria = Secretaria::where('id', 1)
            ->select(
                'nombre_secretaria',
                'telefono_secretaria',
                'email_secretaria',
                'foto_secretaria',
                'nombre_documento',
                'detalle_documento',
                'documento',                
            )
            ->first();
        
         return view('secretaria.secretaria', compact('secretaria'));
    }
}
