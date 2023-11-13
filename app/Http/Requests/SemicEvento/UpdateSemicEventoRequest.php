<?php

namespace App\Http\Requests\Semicevento;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemicEventoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'min:2', 'max:150'],
            'descricao' => ['required', 'string', 'min:2'],
            'visivel' => ['boolean'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date'],
            'data_certificado' => ['required', 'date'],
            'status' => ['required','string']
        ];
    }
}
