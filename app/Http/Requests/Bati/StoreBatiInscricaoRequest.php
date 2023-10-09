<?php

namespace App\Http\Requests\Bati;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

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
            'telefone_bati_inscricao' => ['required', 'string', 'size:15'],
            'email_bati_inscricao' => ['required', 'string', 'email', 'max:255',],
            'matricula_bati_inscricao' => ['required', 'string', 'max:100'],
            'centro_id' => ['required'],
            'departamento_bati_inscricao' => ['required', 'string', 'max:255'],
            'regime_de_trabalho_bati_inscricao' => ['required', 'string', 'max:255'],
            'titulacao_categoria_funcional_bati_inscricao' => ['required', 'string', 'max:255'],
            'opcao_1' => ['required'],
            'ppgraduacao' => ['required_if:opcao_1,SIM'],
            'titulo_bati_inscricao_2' =>'sometimes|required_with:resumo_bati_incricao_2,modalidade_bolsa_bati_inscricao_2,anexo_pdf_arquivo_bati_inscricao_2',
            'resumo_bati_incricao_2' => 'sometimes|required_with:titulo_bati_inscricao_2,modalidade_bolsa_bati_inscricao_2,anexo_pdf_arquivo_bati_inscricao_2',
            'modalidade_bolsa_bati_inscricao_2' => 'sometimes|required_with:titulo_bati_inscricao_2,resumo_bati_incricao_2,anexo_pdf_arquivo_bati_inscricao_2',
            'anexo_pdf_arquivo_bati_inscricao_2' => 'sometimes|required_with:titulo_bati_inscricao_2,resumo_bati_incricao_2,modalidade_bolsa_bati_inscricao_2',
            'areaconhecimento_id' => ['required'],
            'anexo_pdf_bati_inscricao_projetospesquisa' => ['required', 'mimes:pdf'],
            'anexo_pdf_bati_inscricao_termooutorga' => ['mimes:pdf'],
            'modalidade_bolsa_bati_inscricao' => ['required'],
            'titulo_bati_inscricao' => ['required', 'string', 'max:255'],
            'resumo_bati_incricao' => ['required', 'string', 'max:600'],
            'anexo_pdf_arquivo_bati_inscricao' => ['required', 'mimes:pdf'],
            'anexo_pdf_curriculolattes_bati_inscricao' => ['required', 'mimes:pdf']
        ];
    }

    public function messages()
    {
        return [
            'nome_bati_inscricao' => 'O nome é obrigatório',

            'titulo_bati_inscricao_2.required_with' => 'O Plano de Trablaho 2 existe campo sem informação, se você não for adicionar um segundo plano de trabalho deixe em branco os campos se for
            adicionar complete as informações',
            'resumo_bati_incricao_2.required_with' => 'O Plano de Trablaho 2 existe campo sem informação, se você não for adicionar um segundo plano de trabalho deixe em branco os campos se for
            adicionar complete as informações',
            'modalidade_bolsa_bati_inscricao_2.required_with' => 'O Plano de Trablaho 2 existe campo sem informação, se você não for adicionar um segundo plano de trabalho deixe em branco os campos
            se for adicionar complete as informações',
            'anexo_pdf_arquivo_bati_inscricao_2.required_with' => 'O Plano de Trablaho 2 existe campo sem informação, se você não for adicionar um segundo plano de trabalho deixe em branco os campos
            se for adicionar complete as informações',

            'opcao_1.required' => 'E obrigátorio responder a perguntar!',

        ];
    }
}
