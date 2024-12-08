<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateItensCompraTable {
    public function up() {
        Capsule::schema()->create('itens_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('estoque_id');
            $table->unsignedInteger('produto_id');
            $table->unsignedInteger('compra_id');
            $table->integer('quantidade');
            $table->timestamps();
            $table->foreign('estoque_id')->references('id')->on('estoques')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('itens_compra');
    }
}
