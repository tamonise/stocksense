<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Compra extends Model {
    protected $table = 'compras';

    public $timestamps = true;

    protected $fillable = [
        'data', 'formaPagamento', 'quantidade', 'total', 'idCliente', 'status'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

}