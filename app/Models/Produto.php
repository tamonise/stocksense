<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    protected $table = 'fornecedores';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'descricao', 'categoria', 'precoCompra', 'precoVenda'
    ];

    public function aquisicoes() {
        return $this->hasMany(Aquisicao::class, 'idProduto');
    }

    public function itensCompra() {
        return $this->hasMany(ItemCompra::class);
    }
}