<?php

namespace Database\Factories;

use App\Models\PP_IndicacaoBolsistasInscricao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PP_IndicacaoBolsistasInscricaoFactory extends Factory
{
    protected $model = PP_IndicacaoBolsistasInscricao::class;
    private static $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pp_i_bolsista_id' => '1',
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'numero_inscricao' => static function (array $attributes) {
                self::$counter++;
                return self::$counter;
            },
            'nome_bolsista' => 'Dajdkfhas',
            'email_bolsista' => 'daniel@gmail.com',
            'cpf_bolsista' => '61741281300',
            'telefone_bolsista' => '98984160491',
            'endereco_bolsista' => 'fsafdsadfsafdsafd',
            'curso_id' => '1',
            'centro_id' => '1',
            'status' => 'Em Analise',
            'numero_identidade' => '123456789',
            'documento_identidade' => 'PP_IndicacaoBolsistas/2023/1/documento_identidade/12345678945/documento_identidade_11044420230615648b1a7cede38.pdf',
            'documento_cpf' => 'PP_IndicacaoBolsistas/2023/1/documento_cpf/12345678945/documento_cpf_11044520230615648b1a7d09a29.pdf',
            'nome_orientador' => 'teste teste',
            'telefone_orientador' => '98984160491',
            'email_orientador' => 'Daniel@gmail.com',
            'cpf_orientador' => '61741281300',
            'centro_orientador_id' => '1',
            'status' => 'Em Analise', 
            'titulo_projeto_orientador' => 'testeste',
            'titulo_plano_orientador' => 'testeste',
            'historico_escolar' => 'PP_IndicacaoBolsistas/2023/1/historico_escolar/12345678945/historico_escolar_11044520230615648b1a7d0c1a4.pdf',
            'declaracao_vinculo' => 'PP_IndicacaoBolsistas/2023/1/declaracao_vinculo/12345678945/declaracao_vinculo_11044520230615648b1a7d0e5d1.pdf',
            'termo_compromisso_bolsista' => 'PP_IndicacaoBolsistas/2023/1/termo_compromisso_bolsista/12345678945/termo_compromisso_bolsista_11044520230615648b1a7d10acd.pdf',
            'declaracao_negativa_vinculo' => 'PP_IndicacaoBolsistas/2023/1/declaracao_negativa_vinculo/12345678945/declaracao_negativa_vinculo_11044520230615648b1a7d12f51.pdf',
            'curriculo' => 'PP_IndicacaoBolsistas/2023/1/curriculo/12345678945/curriculo_11044520230615648b1a7d154d9.pdf',
            'declaracao_conjuta_estagio' => 'PP_IndicacaoBolsistas/2023/1/declaracao_conjuta_estagio/12345678945/declaracao_conjuta_estagio_11044520230615648b1a7d179e7.pdf',
            'agencia_banco' => '21325',
            'numero_conta_corrente' => '21354',
            'comprovante_conta_corrente' => 'PP_IndicacaoBolsistas/2023/1/comprovante_conta_corrente/12345678945/comprovante_conta_corrente_11044520230615648b1a7d19e87.pdf',
            'termo_compromisso_orientador' => 'PP_IndicacaoBolsistas/2023/1/termo_compromisso_orientador/12345678945/termo_compromisso_orientador_11044520230615648b1a7d1c6e1.pdf'
        ];
    }
}
