<?php

namespace App\Http\Requests\PibicIndicacao;

use Illuminate\Foundation\Http\FormRequest;

class StorePibicIndicacaoInscricaoRequest extends FormRequest
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

//        dd($this->input('pibic_tipo'));
        return [

            'pibic_tipo' => 'required',

            //Identificação do Bolsista
            'nome_bolsista' => ['required', 'string', 'max:255'],
            'email_bolsista' => ['required', 'string', 'email', 'max:255',],
            'cpf_bolsista' => ['required', 'string', 'cpf', 'size:14'],
            'telefone_bolsista' => ['required', 'string', 'size:15'],
            'endereco_bolsista' => ['required', 'array'],
            'endereco_bolsista.cep' => ['required', 'size:9'],
            'endereco_bolsista.endereco' => ['required'],
            'endereco_bolsista.bairro' => ['required'],
            'centro_bolsista' => ['required', 'exists:centros,id'],
            'curso_bolsista' => ['required', 'exists:cursos,id'],
            'numero_identidade' => ['required', 'string', 'min:2', 'max:200'],
            'documento_identidade' => ['required', 'mimes:pdf', 'max:5000'],
            'documento_cpf' => ['required', 'mimes:pdf'],


            //Identificação do Orientador
            'nome_orientador' => ['required', 'string', 'min:2', 'max:150'],
            'telefone_orientador' => ['required', 'string', 'size:15'],
            'email_orientador' => ['required', 'string', 'email', 'max:255'],
            'cpf_orientador' => ['required', 'string', 'cpf', 'size:14'],
            'centro_orientador' => ['required', 'exists:centros,id'],
            'tituloprojeto_orientador' => ['required', 'string', 'min:2'],
            'tituloplano_bolsista' => ['required', 'string', 'min:2'],
            'palavras_chave' => ['required_if:pibic_tipo,Ações Afirmativas,Cnpq', 'string', 'min:2', 'max:200'],
            'curriculolattes_orientador' => ['required_if:pibic_tipo,Cnpq', 'string', 'min:2', 'max:200'],


            //Dados Acadêmicos
            'historico_escolar' => ['required', 'mimes:pdf'],
            'declaracao_vinculo' => ['required', 'mimes:pdf'],
            'termocompromisso_bolsista' => ['required', 'mimes:pdf'],
            'termocompromissobolsista_fapema' => ['required_if:pibic_tipo,Fapema', 'mimes:pdf'],
            'declaracaonegativa_vinculo' => ['required_if:pibic_tipo,Ações Afirmativas,Cnpq,Pibic,Fapema', 'mimes:pdf'],
            'declaracaoempregaticio_fapema' => ['required_if:pibic_tipo,Fapema', 'mimes:pdf'],
            'curriculo_lattes' => ['required', 'mimes:pdf'],
            'declaracao_conjuta_estagio' => ['nullable', 'mimes:pdf'],
            'doc_comprobatorio' => ['required_if:pibic_tipo,Ações Afirmativas', 'mimes:pdf'],


            //Informações Bancarias
            'agencia_banco' => ['required_if:pibic_tipo,Ações Afirmativas,Cnpq,Pibic,Fapema', 'string', 'min:2', 'max:100'],
            'numero_conta_corrente' => ['required_if:pibic_tipo,Ações Afirmativas,Cnpq,Pibic,Fapema', 'string', 'min:2', 'max:100'],
            'comprovante_conta_corrente' => ['required_if:pibic_tipo,Ações Afirmativas,Cnpq,Pibic,Fapema', 'mimes:pdf'],

            //Documentação do Orientador
            'termocompromisso_orientador' => ['required', 'mimes:pdf']
        ];
    }

    public function messages()
    {
        return [

            //Identificação do Bolsista
            'nome_bolsista' => 'O campo :attribute é obrigatório.',
            'email_bolsista' => 'O campo :attribute é obrigatório.',
            'cpf_bolsista' => 'O campo :attribute é obrigatório.',
            'telefone_bolsista' => 'O campo :attribute é obrigatório.',
            'endereco_bolsista' => 'O campo :attribute é obrigatório.',
            'endereco_bolsista.cep' => 'O campo :attribute é obrigatório.',
            'endereco_bolsista.endereco' => 'O campo :attribute é obrigatório.',
            'endereco_bolsista.bairro' => 'O campo :attribute é obrigatório.',
            'centro_bolsista' => 'O campo :attribute é obrigatório.',
            'curso_bolsista' => 'O campo :attribute é obrigatório.',
            'numero_identidade' => 'O campo :attribute é obrigatório.',
            'documento_identidade' => 'O campo :attribute é obrigatório.',
            'documento_cpf' => 'O campo :attribute é obrigatório.',

            //Identificação do Orientador
            'palavras_chave.required_if' => 'O campo :attribute é obrigatório.',
            'curriculolattes_orientador.required_if' => 'O campo :attribute é obrigatório.',


            //Dados Acadêmicos
            'declaracaonegativa_vinculo.required_if' => 'O campo :attribute é obrigatório.',
            'declaracaoempregaticio_fapema.required_if' => 'O campo :attribute é obrigatório.',
            'doc_comprobatorio.required_if' => 'O campo :attribute é obrigatório.',


        ];
    }

    public function attributes()
    {
        return [

            //Identificação do Bolsista
            'nome_bolsista' => 'Nome Bolsista',
            'email_bolsista' => 'Email Bolsista',
            'cpf_bolsista' => 'Cpf Bolsista',
            'telefone_bolsista' => 'Telefone Bolsista',
            'endereco_bolsista' => '',
            'endereco_bolsista.cep' => 'Cep',
            'endereco_bolsista.endereco' => 'Endereço',
            'endereco_bolsista.bairro' => 'Bairro',
            'centro_bolsista' => 'Centro Bolsista',
            'curso_bolsista' => 'Curso Bolsista',
            'numero_identidade' => 'Identidade Bolsista',
            'documento_identidade' => 'Documento de Identidade Bolsista',
            'documento_cpf' => 'Documento de Cpf Bolsista',

            //Identificação do Orientador
            'nome_orientador' => 'Nome Orientador',
            'telefone_orientador' => 'Telefone Orientador',
            'email_orientador' => 'Email Orientador',
            'cpf_orientador' => 'Cpf Orientador',
            'centro_orientador' => 'Centro Orientador',
            'tituloprojeto_orientador' => 'Titulo do Projeto do Orientador',
            'tituloplano_bolsista' => 'Titulo do Plano de Trabalho do Bolsista',
            'palavras_chave' => '3 Palavras Chaves',
            'curriculolattes_orientador' => 'Link do Curriculo Lattes',


            //Dados Acadêmicos
            'declaracao_vinculo' => 'Declaração de Vinculo do Aluno',
            'termocompromisso_bolsista' => 'Termo de Compromisso do(a) Bolsista',
            'termocompromissobolsista_fapema' => 'Termo de Compromisso do(a) Bolsista',
            'declaracaoempregaticio_fapema' => 'Declaração Negativo de Vinculo Empregatício (Fapema)',
            'declaracaonegativa_vinculo' => 'Declaração Negativo de Vinculo Empregatício',
            'doc_comprobatorio' => 'Documento Comprobatório de Ingresso (Ações Afirmativas)',
            'historico_escolar' => 'Histórico Escolar',
            'curriculo_lattes' => 'Curriculo Lattes',

            //Informações Bancarias
            'agencia_banco' => 'Agência do Banco',
            'numero_conta_corrente' => 'Número da Conta Corrente',
            'comprovante_conta_corrente' => 'Comprovante da Conta Corrente',

            //Documentação do Orientador
            'termocompromisso_orientador' =>  'Termo de Compromisso do Orientador',

        ];
    }
}
