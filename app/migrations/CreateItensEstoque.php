<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateItensEstoque {
    public function up() {
        Capsule::schema()->create('itens_estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('produto_id');
            $table->unsignedInteger('estoque_id');
            $table->integer('quantidade_atual');
            $table->integer('quantidade_minima');
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('estoque_id')->references('id')->on('estoques')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('itens_estoque');
    }
}
