<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBatiInscricaoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'nome_bati_inscricao' => ['required', 'string', 'max:255'],
            'cpf_bati_inscricao' => ['required', 'string', 'cpf', 'size:14'],
            'telefone_bati_inscricao' => ['required', 'string', 'min:11', 'max:11'],
            'email_bati_inscricao' => ['required', 'string', 'email', 'max:255',],
            'matricula_bati_inscricao' => ['required', 'string', 'max:100'],
            'centro_id' => ['required'],
            'departamento_bati_inscricao' => ['requirid', 'string', 'max:255'],
            'regime_de_trabalho_bati_inscricao' => ['requirid', 'string', 'max:255'],
            'titulacao_categoria_funcional_bati_inscricao' => ['requirid', 'string', 'max:255'],
            'areaconhecimento_id' => ['required'],
            'anexo_pdf_bati_inscricao_projetospesquisa' => ['required', 'mimes:pdf'],
            'anexo_pdf_bati_inscricao_termooutorga' => ['required', 'mimes:pdf'],
            'modalidade_bolsa_bati_inscricao' => ['required'],
            'titulo_bati_inscricao' => ['requirid', 'string', 'max:255'],
            'resumo_bati_incricao' => ['requirid', 'string', 'max:600'],
            'anexo_pdf_arquivo_bati_inscricao' => ['required', 'mimes:pdf'],
            'anexo_pdf_curriculolattes_bati_inscricao' => ['required', 'mimes:pdf']
        ];
    }
}
