<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsTituloTrabalhoInSemicEventoInscricao extends Migration
{

    public function up()
    {
        Schema::table('semic_eventoinscricao', function (Blueprint $table) {

             ///alterar tipo de coluna
             $table->longText('titulo_trabalho')->change();
        });
    }
    public function down()
    {
        Schema::table('semic_eventoinscricao', function (Blueprint $table) {
            $table->string('titulo_trabalho')->change();
        });
    }
}
