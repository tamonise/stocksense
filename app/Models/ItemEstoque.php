<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use App\Models\Estoque;

class ItemEstoque extends Model {
    protected $table = 'itens_estoque';

    public $timestamps = true;

    protected $fillable = [
        'quantidade_atual', 'quantidade_minima', 'preco_venda', 'produto_id', 'estoque_id'
    ];


    public function produto() {
        return $this->belongsTo(Produto::class);
    }

    public function estoque() {
        return $this->belongsTo(Estoque::class);
    }

}