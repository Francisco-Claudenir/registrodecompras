<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsVisivelInSemics extends Migration
{

    public function up()
    {
        Schema::table('semics', function (Blueprint $table) {

            ////Adicao de coluna visivel
            $table->boolean('visivel')->default(false);

            ///Adição da coluna Banner
            $table->string('banner');
           
        });
    }

    public function down()
    {
         Schema::table('semics', function (Blueprint $table) {
            $table->dropColumn('visivel');
            $table->dropColumn('banner');
         });
    }
}
