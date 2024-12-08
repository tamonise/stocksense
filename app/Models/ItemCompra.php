<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;
use App\Models\Produto;

class ItemCompra extends Model {
    protected $table = 'itensCompra';

    public $timestamps = true;

    protected $fillable = [
        'idEstoque', 'idProduto', 'quantidade'
    ];

    public function produto() {
        return $this->belongsTo(Fornecedor::class, 'idProduto');
    }

    public function estoque() {
        return $this->belongsTo(Produto::class, 'idEstoque');
    }
}