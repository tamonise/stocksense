<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model {
    protected $table = 'fornecedores';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'cnpj', 'endereco', 'telefone', 'contato', 'prazoEntrega'
    ];

    public function aquisicoes() {
        return $this->hasMany(Aquisicao::class, 'idFornecedor');
    }
}