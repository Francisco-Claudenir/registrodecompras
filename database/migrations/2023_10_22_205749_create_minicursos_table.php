<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinicursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minicursos', function (Blueprint $table) {
            $table->uuid('minicurso_id')->unique();
            $table->unsignedBigInteger('semicevento_id');
            $table->string('nome');
            $table->integer('vagas');
            $table->integer('horas');
            $table->timestamps();
            $table->softDeletes();



            ////Relacionando com a tabela semic_eventos
            $table->foreign('semicevento_id')->references('semic_evento_id')->on('semic_eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minicursos');
    }
}
