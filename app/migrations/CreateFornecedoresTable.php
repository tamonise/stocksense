<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateFornecedoresTable {
    public function up() {
        Capsule::schema()->create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->integer('cnpj');
            $table->string('endereco', 255);
            $table->string('telefone', 255);
            $table->string('email', 255);
            $table->string('contato', 255);
            $table->date('prazoEntrega');
            $table->timestamps();
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('fornecedores');
    }
}