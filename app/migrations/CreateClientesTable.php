<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable {
    public function up() {
        Capsule::schema()->create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('cpf', 20);
            $table->string('endereco', 255);
            $table->string('telefone', 20);
            $table->string('email', 255);
            $table->unsignedInteger('empresa_id');
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('clientes');
    }
}
