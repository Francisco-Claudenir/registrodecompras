<?php

namespace App\Http\Requests\SemicEvento;

use Illuminate\Foundation\Http\FormRequest;

class StoreSemicEventoInscricaoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome_orientador' => ['required', 'string', 'max:255'],
            'titulo_trabalho' => ['required', 'string', 'max:255'],
            'cota_bolsa' => ['required'],
            'arquivo' => ['required', 'mimes:pdf']
        ];
    }

    public function messages()
    {
        return [
            'nome_orientador' => 'O nome do orientador é obrigatório',
            'titulo_trabalho' => 'O nome é obrigatório',
            'cota_bolsa' => 'O nome é obrigatório',
            'arquivo' => 'O nome é obrigatório',
        ];
    }
}
