<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable {
    public function up() {
        Capsule::schema()->create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->text('descricao');
            $table->string('categoria', 100);
            $table->decimal('preco_compra', 10, 2);
            $table->decimal('preco_venda', 10, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('produtos');
    }
}
