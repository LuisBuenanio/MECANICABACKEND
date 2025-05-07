<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioRequest extends FormRequest
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
        $convenio = $this->route()->parameter('convenio');

        $rules =[
            'nombre' => 'required',
            'coordinador' => 'required',
            'estado' => 'required|in:1,2',
            'objetivo' => 'required',
            'tipo_convenio_id' => 'required',
        ];

        if ($this-> estado == 2){
            $rules = array_merge($rules, [
                'resolucion' => 'required',
                'fecha_legalizacion' => 'required',                   
                'vigencia' => 'required',
            ]);
            
        }
        return $rules;
    }
}
