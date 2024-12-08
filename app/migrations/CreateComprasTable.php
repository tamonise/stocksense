<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateComprasTable {
    public function up() {
        Capsule::schema()->create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data', 20);
            $table->string('forma_pagamento', 255);
            $table->integer('quantidade');
            $table->double('total');
            $table->unsignedInteger('cliente_id');
            $table->string('status', 255);
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('compras');
    }
}
