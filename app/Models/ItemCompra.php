<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;
use App\Models\Produto;
use App\Models\Compra;

class ItemCompra extends Model {
    protected $table = 'itens_compra';

    public $timestamps = true;

    protected $fillable = [
        'quantidade', 'produto_id', 'estoque_id', 'compra_id'
    ];

    public function produto() {
        return $this->belongsTo(Produto::class);
    }

    public function estoque() {
        return $this->belongsTo(Estoque::class);
    }

    public function compra() {
        return $this->belongsTo(Compra::class);
    }
}