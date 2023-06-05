<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batis', function (Blueprint $table) {
            $table->bigIncrements('bati_id')->autoIncrement()->unique();
            $table->string('nome');
            $table->string('descricao');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->string('status', 45)->default('Aberto');
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
        Schema::dropIfExists('batis');
    }
}
