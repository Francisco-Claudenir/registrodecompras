<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTitulacaoInSemicInscricaos extends Migration
{

    public function up()
    {
        Schema::table('semic_inscricaos', function (Blueprint $table) {

            $table->string('titulacao')->nullable();
        });
    }

    public function down()
    {
        Schema::table('semic_inscricaos', function (Blueprint $table) {
           
            $table->dropColumn('titulacao');

        });
    }
}
