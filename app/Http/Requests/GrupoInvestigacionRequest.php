<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoInvestigacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $grupoInvestigacion = $this->route()->parameter('grupoInvestigacion');

        $rules =[
            'codigo' => 'required|unique:grupos_investigacion,codigo',    
            'nombre' => 'required',   
            'objetivo' => 'required',     
            'estado' => 'required|in:1,2',
        ];

        if ($grupoInvestigacion) {
            $rules['codigo'] = 'required|unique:grupos_investigacion,codigo,' .$grupoInvestigacion->id;
        }

        if ($this-> estado == 2){
            $rules = array_merge($rules, [
                    'siglas' => 'required',
                    'mision' => 'required',
                    'vision' => 'required',
            ]);
            
        }

        return $rules;
    }
}
