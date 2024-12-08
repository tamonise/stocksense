<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateComprasTable {
    public function up() {
        Capsule::schema()->create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->string('formaPagamento', 255);
            $table->integer('quantidade');
            $table->double('total');
            $table->unsignedInteger('idCliente');
            $table->string('status', 255);
            $table->timestamps();
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('compras');
    }
}