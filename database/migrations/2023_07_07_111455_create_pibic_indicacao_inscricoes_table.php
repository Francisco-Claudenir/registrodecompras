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
            $table->uuid('pi_inscricao_id')->unique();
            $table->integer('numero_inscricao');
            $table->string('status');
            $table->unsignedBigInteger('pibicindicacao_id');
            $table->unsignedBigInteger('user_id');

            //Identificação do bolsista
            $table->string('nome_bolsista');
            $table->json('endereco_bolsista');
            $table->unsignedBigInteger('curso_bolsista');
            $table->unsignedBigInteger('centro_bolsista');
            $table->string('telefone_bolsista');
            $table->string('email_bolsista');
            $table->string('numero_identidade');
            $table->string('documento_identidade');
            $table->string('cpf_bolsista');
            $table->string('documento_cpf');

            //Identificação do Orientador
            $table->string('nome_orientador');
            $table->string('telefone_orientador');
            $table->string('cpf_orientador');
            $table->unsignedBigInteger('centro_orientador');
            $table->string('email_orientador');
            $table->string('tituloprojeto_orientador');
            $table->string('tituloplano_bolsista');
            $table->string('palavras_chave')->nullable();
            $table->string('curriculolattes_orientador')->nullable();

            //Dados Academicos
            $table->string('historico_escolar');
            $table->string('declaracao_vinculo');
            $table->string('termocompromisso_bolsista');
            $table->string('termocompromissobolsista_fapema')->nullable();
            $table->string('declaracaonegativa_vinculo')->nullable();
            $table->string('declaracaoempregaticio_fapema')->nullable();
            $table->string('curriculo_lattes');
            $table->string('declaracao_conjuta_estagio')->nullable();
            $table->string('doc_comprobatorio')->nullable();

            //Informações Bancarias
            $table->string('agencia_banco')->nullable();
            $table->string('numero_conta_corrente')->nullable();
            $table->string('comprovante_conta_corrente')->nullable();

            //Documentação Orientador
            $table->string('termocompromisso_orientador');
            $table->softDeletes();
            $table->timestamps();



            ////Relacionando com a tabela Pibic Indicação
            $table->foreign('pibicindicacao_id')->references('pibicindicacao_id')->on('pibic_indicacoes');

            ////Relacionando com a tabela User
            $table->foreign('user_id')->references('id')->on('users');

            ////Relacionando com a tabela Curso
            $table->foreign('curso_bolsista')->references('id')->on('cursos');

            ////Relacionando com a tabela Centro
            $table->foreign('centro_orientador')->references('id')->on('centros');
            $table->foreign('centro_bolsista')->references('id')->on('centros');
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
