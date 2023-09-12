<?php

namespace App\Http\Requests\Bati;

use Illuminate\Foundation\Http\FormRequest;

class StoreBatiRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'min:2', 'max:150'],
            'visivel' => ['boolean'],
            'descricao' => ['required', 'string', 'min:2', 'max:255'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date'],
            'banner' => ['required', 'mimes:jpeg,png,jpg'],
        ];
    }
}
