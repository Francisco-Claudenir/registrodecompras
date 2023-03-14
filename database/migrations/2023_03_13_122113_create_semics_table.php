<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semics', function (Blueprint $table) {
            $table->bigIncrements('semic_id')->autoIncrement()->unique();
            $table->string('nome');
            $table->string('descricao');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
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
        Schema::dropIfExists('semics');
    }
}
