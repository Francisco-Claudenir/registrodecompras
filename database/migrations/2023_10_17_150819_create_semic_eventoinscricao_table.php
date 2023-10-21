<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemicEventoinscricaoTable extends Migration
{

    public function up()
    {
        Schema::create('semic_eventoinscricao', function (Blueprint $table) {
            $table->uuid('semic_eventoinscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('semic_evento_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nome_orientador');
            $table->string('titulo_trabalho');
            $table->string('arquivo');
            $table->string('cota_bolsa');
            $table->integer('numero_inscricao');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();


            ////Relacionando com a tabela semic_eventos
            $table->foreign('semic_evento_id')->references('semic_evento_id')->on('semic_eventos');

            ////Relacionando com a tabela users
            $table->foreign('user_id')->references('id')->on('users');


        });
    }




    public function down()
    {
        Schema::dropIfExists('semic_eventoinscricao');
    }
}
