<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
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
        $proyecto = $this->route()->parameter('proyecto');

        $rules =[
            'nombre' => 'required',
            'estado' => 'required|in:1,2',
            'ejecutandose' => 'required|in:1,2',
            'tipo_proyecto_id' => 'required',
        ];

        if ($this-> estado == 2){
            $rules = array_merge($rules, [
                'codigo' => 'required',
                'coordinador' => 'required',
                'objetivo' => 'required',
            ]);
            
        }
        return $rules;
    }
}
