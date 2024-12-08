<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable {
    public function up() {
        Capsule::schema()->create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('descricao', 255);
            $table->string('categoria', 255);
            $table->double('precoCompra');
            $table->double('precoVenda');
            $table->timestamps();
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('produtos');
    }
}