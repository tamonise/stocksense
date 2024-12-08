<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable {
    public function up() {
        Capsule::schema()->create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->integer('cnpj');
            $table->timestamps();
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('empresas');
    }
}