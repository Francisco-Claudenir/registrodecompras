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
            'cursos' => ['required', 'string', 'min:2', 'max:200'],
            'centros_id' => ['required', 'exists:centros,id'],
            'numero_identidade' => ['required', 'string', 'min:2', 'max:200'],
            'documento_identidade' => ['required'],
            'documento_cpf' => ['required'],
            'nome_orientador' => ['required', 'string', 'min:2', 'max:150'],
            'telefone_orientador' => ['required', 'string', 'min:1', 'max:11', 'regex:/^\d+$/'],
            'email_orientador' => ['required', 'string', 'min:2', 'max:100'],
            'centros_orientador_id' => ['required', 'exists:centros,id'],
            'titulo_projeto_orientador' => ['required', 'string', 'min:2', 'max:200'],
            'titulo_plano_orientador' => ['required', 'string', 'min:2', 'max:200'],
            'historico_escolar' => ['required'],
            'declaracao_vinculo' => ['required'],
            'termo_compromisso_bolsista' => ['required'],
            'declaracao_negativa_vinculo' => ['required'],
            'curriculo' => ['required'],
            'declaracao_conjuta_estagio' => ['nullable'],
            'agencia_banco' => ['required', 'string', 'min:2', 'max:100'],
            'numero_conta_corrente' => ['required', 'string', 'min:2', 'max:100'],
            'comprovante_conta_corrente' => ['required'],
            'termo_compromisso_orientador' => ['required']
        ];
    }
}
