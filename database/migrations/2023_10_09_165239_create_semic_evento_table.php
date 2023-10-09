<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemicEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semic_evento', function (Blueprint $table) {
            $table->bigIncrements('semic_evento_id')->autoIncrement()->unique();
            $table->string('nome');
            $table->string('descricao');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->dateTime('data_certificado');
            $table->string('status', 45)->default('Aberto');
            $table->boolean('visivel')->default(false);
            $table->string('banner');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semic_evento');
    }
}
