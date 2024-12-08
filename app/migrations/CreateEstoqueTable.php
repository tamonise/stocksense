<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateEstoqueTable {
    public function up() {
        Capsule::schema()->create('estoques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->unsignedInteger('empresa_id');
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('estoques');
    }
}
