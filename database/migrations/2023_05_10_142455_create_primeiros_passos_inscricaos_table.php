<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimeirosPassosInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primeiros_passos_inscricaos', function (Blueprint $table) {
            $table->bigIncrements('passos_inscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('primeiropasso_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('areaconhecimento_id');
            $table->string('identidade');
            $table->string('matricula');
            $table->string('centro');
            $table->string('copiacontrato');
            $table->string('tituloprojetopesquisa');
            $table->string('resumoprojeto');
            $table->string('projetopesquisa');
            $table->string('chefeimediato');
            $table->string('parecercomite')->nullable();
            $table->string('curriculolattes');
            $table->timestamps();
            $table->softDeletes();

            ////Relacionando com a tabela sub_areas
            $table->foreign('areaconhecimento_id')->references('areaconhecimento_id')->on('sub_areas');

            ////Relacionando com a tabela users
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
        Schema::dropIfExists('primeiros_passos_inscricaos');
    }
}
