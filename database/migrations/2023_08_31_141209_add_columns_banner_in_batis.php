<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsBannerInBatis extends Migration
{
  
    public function up()
    {
        Schema::table('batis', function (Blueprint $table) {
           
            ////Adicao de coluna visivel
             $table->boolean('visivel')->default(false);

             ///Adição da coluna Banner
             $table->string('banner');
        });
    }

   
    public function down()
    {
        Schema::table('batis', function (Blueprint $table) {
            $table->dropColumn('visivel');
            $table->dropColumn('banner');
        });
    }
}
