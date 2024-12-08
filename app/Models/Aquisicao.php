<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;
use App\Models\Produto;

class Aquisicao extends Model {
    protected $table = 'aquisicoes';

    public $timestamps = true;

    protected $fillable = [
        'data_compra', 'quantidade', 'total', 'data_recebimento'
    ];

    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class);
    }

    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}