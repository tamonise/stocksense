<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateAquisicoesTable {
    public function up() {
        Capsule::schema()->create('aquisicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data_compra', 20);
            $table->integer('quantidade');
            $table->integer('total');
            $table->string('data_recebimento', 20);
            $table->unsignedInteger('fornecedor_id');
            $table->unsignedInteger('produto_id');
            $table->timestamps();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('aquisicoes');
    }
}