<?php
namespace App\Http\Controllers;

use App\Models\Integrante;
use Illuminate\Http\Request;

class IntegranteController extends Controller
{
    public function index()
    {
        $integrantes = Integrante::with('tipo_integrante')->get();
        return response()->json(['datos' => $integrantes]);
    }

    public function show($id)
    {
        $integrante = Integrante::with('tipo_integrante')->find($id);
        if (!$integrante) {
            return response()->json(['mensaje' => 'No se encontro la integrante'], 404);
        }
        return response()->json(['datos' => $integrante], 202);
    }
}
