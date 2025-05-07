<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriaRequest extends FormRequest
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
        $galeria = $this->route()->parameter('galeria');

        $rules =[
            'nombre' => 'required',
            'slug' => 'required|unique:galerias,slug',
            'estado' => 'required|in:1,2',
            'portada' => 'image'
        ];

        if($galeria){
            $rules['slug'] = 'required|unique:galerias,slug,' .$galeria->id;
        }

        if ($this-> input ('estado') == 2){
            $rules = array_merge($rules, [
                    'fecha_creacion' => 'required',
                    'descripcion' => 'required',
            ]);
            
        }
        return $rules;
    }
}
