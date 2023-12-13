<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $evento = $this->route()->parameter('evento');

        $rules =[
            'titulo' => 'required',            
            'estado' => 'required|in:1,2',
        ];

        if ($this->estado == 2){
            $rules = array_merge($rules, [
                'descripcion' => 'required',
                'fecha_inicio' => 'required|date_format:Y-m-d\TH:i',
                'fecha_fin' => 'required|date_format:Y-m-d\TH:i|after_or_equal:fecha_inicio',
            ]);
            
        }
        return $rules;
    }
}
