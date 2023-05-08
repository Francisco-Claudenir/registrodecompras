<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanoTrabalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_trabalhos', function (Blueprint $table) {
            $table->bigIncrements('plano_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('modalidade_id');
            $table->string('titulo');
            $table->string('resumo');
            $table->string('arquivo');
            $table->timestamps();

            ////Relacionando com a tabela modalidade
            $table->foreign('modalidade_id')->references('modalidade_id')->on('modalidade_bolsas')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plano_trabalhos');
    }
}
