<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnSemicInscricaoIdInBatiInscricoes extends Migration
{
   
    public function up()
    {
        Schema::table('bati_inscricoes', function (Blueprint $table) {
            $table->dropColumn('semic_inscricao_id');
        });
    }

    
    public function down()
    {
        Schema::table('bati_inscricoes', function (Blueprint $table) {
            $table->bigIncrements('semic_inscricao_id')->autoIncrement()->unique();
        });
    }
}