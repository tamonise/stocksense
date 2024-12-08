<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Estoque;

class Empresa extends Model {
    protected $table = 'empresas';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'cnpj'
    ];

    public function clientes() {
        return $this->hasMany(Cliente::class);
    }

    public function estoques() {
        return $this->hasMany(Estoque::class);
    }
    
}