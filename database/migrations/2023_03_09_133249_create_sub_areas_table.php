<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_areas', function (Blueprint $table) {
            $table->bigIncrements('areaconhecimento_id')->autoIncrement()->unique();
            $table->unsignedBigInteger('area_id');
            $table->string('nome');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('sub_areas');
    }
}
