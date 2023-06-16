<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpIndicacaoBolsistasInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_indicacao_bolsistas_inscricao', function (Blueprint $table) {
            $table->uuid('pp_i_bolsista_inscricao_id')->unique();
            $table->unsignedBigInteger('pp_i_bolsista_id');
            $table->unsignedBigInteger('user_id');
            $table->string('numero_inscricao');
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('centro_id');
            $table->string('numero_identidade');
            $table->string('documento_identidade');
            $table->string('documento_cpf');
            $table->string('nome_orientador');
            $table->string('telefone_orientador');
            $table->string('email_orientador');
            $table->unsignedBigInteger('centro_orientador_id');
            $table->string('titulo_projeto_orientador');
            $table->string('titulo_plano_orientador');
            $table->string('historico_escolar');
            $table->string('declaracao_vinculo');
            $table->string('termo_compromisso_bolsista');
            $table->string('declaracao_negativa_vinculo');
            $table->string('curriculo');
            $table->string('declaracao_conjuta_estagio')->nullable();
            $table->string('agencia_banco');
            $table->string('numero_conta_corrente');
            $table->string('comprovante_conta_corrente');
            $table->string('termo_compromisso_orientador');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pp_i_bolsista_id')->references('pp_i_bolsista_id')->on('pp_indicacao_bolsistas');

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('curso_id')->references('id')->on('cursos');

            $table->foreign('centro_id')->references('id')->on('centros');
            
            $table->foreign('centro_orientador_id')->references('id')->on('centros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pp_indicacao_bolsistas_inscricao');
    }
}
