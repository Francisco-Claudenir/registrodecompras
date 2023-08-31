<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsCentroIdInBatiInscricoes extends Migration
{
   
    public function up()
    {
        Schema::table('bati_inscricoes', function (Blueprint $table) {
            

            // exclusão de colunas
           
            $table->dropColumn('areaconhecimento');
            $table->dropColumn('centro');
           

            // criacao de colunas
            $table->bigIncrements('bati_inscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('areaconhecimento_id');
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('modalidade_id');

            //relacionamentos
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('areaconhecimento_id')->references('areaconhecimento_id')->on('sub_areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('centro_id')->references('id')->on('centros')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('modalidade_id')->references('modalidade_id')->on('modalidade_bolsas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('area_id')->references('area_id')->on('grande_areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bati_id')->references('bati_id')->on('batis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

   
    public function down()
    {
        Schema::table('bati_inscricoes', function (Blueprint $table) {
           
           
            $table->string('areaconhecimento');
            $table->string('centro');


            $table->dropForeign(['user_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['centro_id']);
            $table->dropForeign(['modalidade_id']);
            $table->dropForeign(['area_id']);
            $table->dropForeign(['bati_id']);

            $table->dropColumn('bati_inscricao_id');   
            $table->dropColumn('user_id'); 
            $table->dropColumn('areaconhecimento_id'); 
            $table->dropColumn('centro_id'); 
            $table->dropColumn('modalidade_id'); 

        });
    }
}