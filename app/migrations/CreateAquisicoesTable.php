<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateAquisicoesTable {
    public function up() {
        Capsule::schema()->create('aquisicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_compra');
            $table->integer('quantidade');
            $table->double('total');
            $table->date('data_recebimento');
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