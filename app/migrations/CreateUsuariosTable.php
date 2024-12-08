<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable {
    public function up() {
        Capsule::schema()->create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('email')->unique();
            $table->string('senha', 255);
            $table->timestamps();
        });
    }

    public function down() {
        Capsule::schema()->dropIfExists('usuarios');
    }
}