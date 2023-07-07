<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibicIndicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pibic_indicacoes', function (Blueprint $table) {
            $table->bigIncrements('pibicindicacao_id')->autoIncrement()->unique();
            $table->string('nome');
            $table->string('tipo');
            $table->string('descricao');
            $table->boolean('visivel')->default(false);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->string('status', 45)->default('Aberto');
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
        Schema::dropIfExists('pibic_indicacoes');
    }
}
