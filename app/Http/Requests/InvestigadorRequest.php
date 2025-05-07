<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigadorRequest extends FormRequest
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
        $investigador = $this->route()->parameter('investigador');

        $rules =[
            'nombre' => 'required',
            'estado' => 'required|in:1,2',
            'email' => 'required|email:required',
            
        ];

        
        return $rules;
    }
}
