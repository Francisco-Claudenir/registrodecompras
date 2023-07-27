<?php

namespace App\Http\Requests\Centro;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCentroRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'centros' => ['required', 'string', 'min:2', 'max:150'],
            'cidade_id' => ['required', 'exists:cidades,id'],
            'latitude' => ['required', 'string', 'min:2', 'max:150'],
            'longitude' => ['required', 'string', 'min:2', 'max:150'],
        ];

    }
}