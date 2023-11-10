<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadoMinicursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificado_minicursos', function (Blueprint $table) {
            $table->uuid('certificadominicursos_id')->unique();
            $table->uuid('certificado_id');
            $table->uuid('minicursosemiceventoinscricao_id');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();


            ////Relacionando com a tabela certificado
            $table->foreign('certificado_id')->references('certificado_id')->on('certificados')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('minicursosemiceventoinscricao_id')->references('minicursosemiceventoinscricao_id')->on('minicurso_semiceventoinscricao')
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
        Schema::dropIfExists('certificado_minicursos');
    }
}
