<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $table = 'usuarios';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'email', 'senha'
    ];
}