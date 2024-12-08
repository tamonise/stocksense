<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aquisicao;
use App\Models\ItemCompra;
use App\Models\ItemEstoque;

class Produto extends Model {
    protected $table = 'produtos';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'descricao', 'categoria', 'preco_compra', 'preco_venda'
    ];

    public function aquisicoes() {
        return $this->hasMany(Aquisicao::class);
    }

    public function itensCompra() {
        return $this->hasMany(ItemCompra::class);
    }

    public function itemEstoque() {
        return $this->hasMany(ItemEstoque::class);
    }
}
