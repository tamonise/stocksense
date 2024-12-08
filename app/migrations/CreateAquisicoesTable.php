<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateAquisicoesTable {
    public function up() {
        Capsule::schema()->create('aquisicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dataCompra');
            $table->integer('quantidade');
            $table->integer('total');
            $table->date('dataRecebimento');
            $table->unsignedInteger('idFornecedor');
            $table->unsignedInteger('idProduto');
            $table->timestamps();
            $table->foreign('idFornecedor')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->foreign('idProduto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('aquisicoes');
    }
}