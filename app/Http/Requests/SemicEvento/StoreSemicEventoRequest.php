<?php

namespace App\Http\Requests\SemicEvento;

use Illuminate\Foundation\Http\FormRequest;

class StoreSemicEventoRequest extends FormRequest
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
            'descricao' => ['required', 'string', 'min:2'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date'],
            'data_certificado' => ['required', 'date'],
            'banner' => ['required', 'mimes:jpeg,png,jpg'],
        ];
    }
}
