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
            $table->string('matricula');
            $table->string('centro');
            $table->string('copiacontrato');
            $table->string('tituloprojetopesquisa');
            $table->string('resumopeojeto');
            $table->string('projetopesquisa');
            $table->string('chefeimediato');
            $table->string('parecercomite')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
