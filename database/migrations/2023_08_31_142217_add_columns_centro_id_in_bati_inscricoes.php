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
            $table->dropColumn('area_id');
            $table->dropColumn('titulocapitulo');
           

            // Criação de colunas
            $table->bigIncrements('bati_inscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('areaconhecimento_id');
            $table->unsignedBigInteger('centro_id');
           
            $table->integer('numero_inscricao');
            $table->string('status');

          

            // Criação de relacionamentos
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('areaconhecimento_id')->references('areaconhecimento_id')->on('sub_areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('centro_id')->references('id')->on('centros')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bati_id')->references('bati_id')->on('batis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

   
    public function down()
    {
        Schema::table('bati_inscricoes', function (Blueprint $table) {
           
            //Recriação de colunas
            $table->string('areaconhecimento');
            $table->string('centro');
            $table->unsignedBigInteger('area_id');
            $table->json('vinculo');

            //Exlusão de relacionamentos
            $table->dropForeign(['user_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['centro_id']); 
            $table->dropForeign(['bati_id']);

            //Exclusão de colunas
            $table->dropColumn('bati_inscricao_id');   
            $table->dropColumn('user_id'); 
            $table->dropColumn('centro_id'); 
            $table->dropColumn('modalidade_id'); 
            $table->dropColumn('numero_inscricao'); 
            $table->dropColumn('status'); 
            $table->string('titulocapitulo');

        });
    }
}
