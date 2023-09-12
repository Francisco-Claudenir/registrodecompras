<?php

namespace App\Http\Requests\Semic;

use Illuminate\Foundation\Http\FormRequest;

class StoreSemicInscricaoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'nome_semicinscricao' => ['required', 'string', 'max:255'],
            'email_semicinscricao' => ['required', 'string', 'email', 'max:255',],
            'cpf_semicinscricao' => ['required', 'string', 'cpf', 'size:14'],
            'areaconhecimento_id' => ['required'],
            'matricula_semicinscricao' => ['required'],
            'titulacao_semicinscricao'=> ['max:255'],
            'titulo_capitulo_semicinscricao' => ['required'],
            'titulo_projeto_semicinscricao' => ['required'],
            'anexo_capitulo_semicinscricao' => ['required', 'mimes:pdf']
        ];
    }
}
