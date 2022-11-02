<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscuelaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules =[
            'nombre' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'mapa' => 'required',
            'direccion' => 'required',
            'perfil' => 'required',
            'campo' => 'required',
            'titulo' => 'required',
            'modalidad' => 'required',
            'fecha_creacion' => 'required',
            'logo_escuela' => 'required'
        ];
        return $rules;
    }
}
