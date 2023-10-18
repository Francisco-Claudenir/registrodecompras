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
            'nome_semicevento_inscricao' => ['required', 'string', 'max:255'],
            'titulotrabalho_semicevento_inscricao' => ['required', 'string', 'max:255'],
            'semicevento_inscricao_cotabolsa' => ['required'],
            'Arquivo_pdf_semicevento_inscricao' => ['required', 'mimes:pdf']
        ];
    }

    public function messages()
    {
        return [
            'nome_semicevento_inscricao' => 'O nome é obrigatório',
            'titulotrabalho_semicevento_inscricao' => 'O nome é obrigatório',
            'semicevento_inscricao_cotabolsa' => 'O nome é obrigatório',
            'Arquivo_pdf_semicevento_inscricao' => 'O nome é obrigatório',
        ];
    }
}
