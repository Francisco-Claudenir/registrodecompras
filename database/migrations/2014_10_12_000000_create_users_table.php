<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id')->nullable();
            $table->string('nome');
            $table->string('email');
            $table->string('cpf');
            $table->string('telefone');
            $table->json('endereco');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            ////Relacionando com a tabela Perfil
            $table->foreign('perfil_id')->references('id')->on('perfis')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
