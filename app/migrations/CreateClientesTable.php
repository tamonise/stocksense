<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable {
    public function up() {
        Capsule::schema()->create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->integer('cpf');
            $table->string('endereco', 255);
            $table->integer('telefone');
            $table->string('email', 255);
            $table->unsignedInteger('idEmpresa');
            $table->timestamps();
            $table->foreign('idEmpresa')->references('id')->on('empresas')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('clientes');
    }
}