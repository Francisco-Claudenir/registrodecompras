<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibicIndicacaoInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pibicindicacao_inscricoes', function (Blueprint $table) {
            $table->bigIncrements('pi_inscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('pibicindicacao_id');
            $table->unsignedBigInteger('user_id');

            //Identificação do bolsista
            $table->string('nome_bolsista');
            $table->json('endereco');
            $table->string('curso');
            $table->string('centro');
            $table->string('telefone');
            $table->string('identidade');
            $table->string('doc_identidade');
            $table->string('cpf');
            $table->string('doc_cpf');

            //Identificação do Orientador
            $table->string('nome_orientador');
            $table->string('cpf_orientador');
            $table->string('centro_orientador');
            $table->string('telefone_orientador');
            $table->string('email_orientador');
            $table->string('tituloprojeto_orientador');
            $table->string('tituloplano_bolsista');
            $table->string('palavras_chave');
            $table->string('curriculolattes_orientador');

            //Dados Academicos
            $table->string('historico_escolar');
            $table->string('declaracao_vinculo');
            $table->string('termocompromisso_bolsista');
            $table->string('termocompromissobolsista_fapema');
            $table->string('declaracaoempregaticio');
            $table->string('declaracaoempregaticio_fapema');
            $table->string('curriculo_lattes');
            $table->string('declaracao_estagio');
            $table->string('doc_comprobatorio');

            //Informações Bancarias
            $table->string('agencia');
            $table->string('conta');
            $table->string('comprovante');

            //Documentação Orientador
            $table->string('termocompromisso_orientador');
            $table->timestamps();


            ////Relacionando com a tabela Pibic Indicação
            $table->foreign('pibicindicacao_id')->references('pibicindicacao_id')->on('pibic_indicacoes');

            ////Relacionando com a tabela User
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pibicindicacao_inscricoes');
    }
}
