<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUserIdInSemicInscricaos extends Migration
{

    public function up()
    {
        Schema::table('semic_inscricaos', function (Blueprint $table) {

            ////Exclusão de relacionamento de semicinscricao para grandearea e de coluna area_id
            $table->dropForeign(['area_id']);
            $table->dropColumn('area_id');
            $table->dropColumn('titulacao');

            $table->unsignedBigInteger('areaconhecimento_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->integer('numero_inscricao');

            ////Relacionando com a tabela users
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

             ////Relacionando com a tabela SubAreas
            $table->foreign('areaconhecimento_id')->references('areaconhecimento_id')->on('sub_areas')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::table('semic_inscricaos', function (Blueprint $table) {

           
            $table->dropColumn('status');
            $table->dropColumn('numero_inscricao');
            $table->dropForeign(['areaconhecimento_id']);
            $table->dropColumn('areaconhecimento_id');   
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');   

            ///recriando coluna excluida e relacionanmento 
            $table->string('titulacao');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('area_id')->on('grande_areas')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
