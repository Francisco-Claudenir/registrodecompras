<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpInscricaoPtrabalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_inscricao__ptrabalhos', function (Blueprint $table) {
            $table->foreignUuid('passos_inscricao_id')->references('passos_inscricao_id')->on('primeiros_passos_inscricaos')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('plano_id');
            $table->timestamps();

            ////Relacionando com a tabela plano_trabalhos
            $table->foreign('plano_id')->references('plano_id')->on('plano_trabalhos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pp_inscricao__ptrabalhos');
    }
}
