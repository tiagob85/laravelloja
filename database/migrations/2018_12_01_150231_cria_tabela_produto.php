<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('nomeexibicao');
            $table->string('descricao');            
            $table->double('peso', 10, 3);
            $table->integer('unidadecompra');
            $table->integer('unidadevenda');
            $table->double('preco', 10, 2);
            $table->double('precopromocional',10, 2);
            $table->integer('ativo');
            $table->double('estoque', 10 ,3);
            $table->string('imagemproduto');
            $table->integer('codfornecedor');
            $table->integer('coddepartamento');
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
        Schema::dropIfExists('produto');
    }
}
