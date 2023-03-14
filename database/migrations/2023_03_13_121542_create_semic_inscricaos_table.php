<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemicInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semic_inscricaos', function (Blueprint $table) {
            $table->bigIncrements('semic_inscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('semic_id');
            $table->unsignedBigInteger('area_id');
            $table->string('nomeorientador');
            $table->string('cpf');
            $table->string('email');
            $table->string('matricula');
            $table->string('titulacao');
            $table->string('tituloprojetoorient');
            $table->string('titulocapitulo');
            $table->string('capitulo');
            $table->timestamps();


            ////Relacionando com a tabela semics
            $table->foreign('semic_id')->references('semic_id')->on('semics')
            ->onUpdate('cascade')->onDelete('cascade');

            ////Relacionando com a tabela grande_areas
            $table->foreign('area_id')->references('area_id')->on('grande_areas')
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
        Schema::dropIfExists('semic_inscricaos');
    }
}
