<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatiInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bati_inscricoes', function (Blueprint $table) {
            $table->bigIncrements('semic_inscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('bati_id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('identidade')->nullable();
            $table->json('endereco')->nullable();
            $table->string('telefone');
            $table->string('email');
            $table->string('matricula');
            $table->string('centro');
            $table->string('departamento');
            $table->string('laboratorio');
            $table->string('regimetrabalho');
            $table->string('titulacao');
            $table->json('vinculo');
            $table->unsignedBigInteger('area_id');
            $table->string('areaconhecimento');
            $table->string('projetospesquisa');
            $table->string('termosoutorga');
            $table->string('titulocapitulo');
            $table->string('curriculolattes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bati_inscricoes');
    }
}
