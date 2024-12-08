<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;
use App\Models\Produto;

class Aquisicao extends Model {
    protected $table = 'aquisicoes';

    public $timestamps = true;

    protected $fillable = [
        'dataCompra', 'quantidade', 'total', 'dataRecebimento', 'dataRecebimento', 'idFornecedor', 'idProduto'
    ];

    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class, 'idFornecedor');
    }

    public function produto() {
        return $this->belongsTo(Produto::class, 'idProduto');
    }
}