<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadoInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificado_inscricoes', function (Blueprint $table) {
            $table->bigIncrements('certificadoinscricao_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('certificado_id');
            $table->unsignedBigInteger('semiceventoinscricao_id');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();


            ////Relacionando com a tabela certificado
            $table->foreign('certificado_id')->references('certificado_id')->on('certificados')
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
        Schema::dropIfExists('certificado_inscricoes');
    }
}
