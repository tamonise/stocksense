<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Compra extends Model {
    protected $table = 'compras';

    public $timestamps = true;

    protected $fillable = [
        'data', 'forma_pagamento', 'total', 'status', 'cliente_id'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function itensCompra() {
        return $this->hasMany(ItemCompra::class);
    }
}