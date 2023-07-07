<?php

namespace App\Http\Requests\PP_IndicacaoBolsistas;

use Illuminate\Foundation\Http\FormRequest;

class StorePP_IndicacaoBolsistasInscricaoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome_bolsista' => ['required', 'string', 'max:255'],
            'email_bolsista' => ['required', 'string', 'email', 'max:255',],
            'cpf_bolsista' => ['required', 'string', 'cpf', 'size:14'],
            'telefone_bolsista' => ['required', 'string', 'size:15'],
            'endereco_bolsista' => ['required', 'array'],
            'endereco_bolsista.cep' => ['required', 'size:9'],
            'endereco_bolsista.endereco' => ['required'],
            'endereco_bolsista.bairro' => ['required'],
            'centro_id' => ['required', 'exists:centros,id'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'numero_identidade' => ['required', 'string', 'min:2', 'max:200'],
            'documento_identidade' => ['required', 'mimes:pdf'],
            'documento_cpf' => ['required', 'mimes:pdf'],
            'nome_orientador' => ['required', 'string', 'min:2', 'max:150'],
            'telefone_orientador' => ['required', 'string', 'size:15'],
            'email_orientador' => ['required', 'string', 'email', 'max:255'],
            'cpf_orientador' => ['required', 'string', 'cpf', 'size:14'],
            'centro_orientador_id' => ['required', 'exists:centros,id'],
            'titulo_projeto_orientador' => ['required', 'string', 'min:2', 'max:200'],
            'titulo_plano_orientador' => ['required', 'string', 'min:2', 'max:200'],
            'historico_escolar' => ['required', 'mimes:pdf'],
            'declaracao_vinculo' => ['required', 'mimes:pdf'],
            'termo_compromisso_bolsista' => ['required', 'mimes:pdf'],
            'declaracao_negativa_vinculo' => ['required', 'mimes:pdf'],
            'curriculo' => ['required', 'mimes:pdf'],
            'declaracao_conjuta_estagio' => ['nullable', 'mimes:pdf'],
            'agencia_banco' => ['required', 'string', 'min:2', 'max:100'],
            'numero_conta_corrente' => ['required', 'string', 'min:2', 'max:100'],
            'comprovante_conta_corrente' => ['required', 'mimes:pdf'],
            'termo_compromisso_orientador' => ['required', 'mimes:pdf']
        ];
    }
}
