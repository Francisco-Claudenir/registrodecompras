<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatiInscricaoPtrabalhosTable extends Migration
{
    
    public function up()
    {
        Schema::create('bati_inscricao_ptrabalhos', function (Blueprint $table) {
          
            $table->unsignedBigInteger('plano_id');
            $table->unsignedBigInteger('bati_inscricao_id');
           
            $table->timestamps();

            ////Relacionando com a tabela plano_trabalhos
            $table->foreign('plano_id')->references('plano_id')->on('plano_trabalhos');
            $table->foreign('bati_inscricao_id')->references('bati_inscricao_id')->on('bati_inscricoes')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('bati_inscricao_ptrabalhos');
    }
}
