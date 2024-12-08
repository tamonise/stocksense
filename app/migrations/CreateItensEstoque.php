<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateItensEstoque {
    public function up() {
        Capsule::schema()->create('itensEstoques', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idProduto');
            $table->integer('quantidadeAtual');
            $table->integer('quantidadeMinima');
            $table->timestamps();
            $table->foreign('idProduto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('itensEstoques');
    }
}