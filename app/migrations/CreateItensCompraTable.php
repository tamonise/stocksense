<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateItensCompraTable {
    public function up() {
        Capsule::schema()->create('itensCompra', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idEstoque');
            $table->unsignedInteger('idProduto');
            $table->integer('quantidade');
            $table->timestamps();
            $table->foreign('idEstoque')->references('id')->on('estoques')->onDelete('cascade');
            $table->foreign('idProduto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('itensCompra');
    }
}