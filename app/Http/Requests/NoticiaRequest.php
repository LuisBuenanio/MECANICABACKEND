<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
        $noticia = $this->route()->parameter('noticia');

        $rules =[
            'titulo' => 'required',
            'slug' => 'required|unique:noticias,slug',
            'estado' => 'required|in:1,2',
        ];

        if ($noticia) {
            $rules['slug'] = 'required|unique:noticias,slug,' .$noticia->id;
        }

        if ($this-> estado == 2){
            $rules = array_merge($rules, [
                    'fecha_publicacion' => 'required|date',
                    'entradilla' => 'required',
                    'contenido' => 'required',
            ]);
            
        }

        return $rules;
    }
}
