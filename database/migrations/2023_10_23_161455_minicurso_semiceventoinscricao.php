<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MinicursoSemiceventoinscricao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minicurso_semiceventoinscricao', function (Blueprint $table) {
            $table->foreignUuid('minicurso_id')->references('minicurso_id')->on('minicursos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('semic_eventoinscricao_id')->references('semic_eventoinscricao_id')->on('semic_eventoinscricao')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('minicurso_semiceventoinscricao');
    }
}
