<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemEstoque extends Model {
    protected $table = 'itensEstoques';

    public $timestamps = true;

    protected $fillable = [
        'idProduto', 'quantidadeAtual', 'quantidadeMinima', 'precoCompra', 'precoVenda'
    ];

    public function produto() {
        return $this->belongsTo(Produto::class, 'idProduto');
    }

}