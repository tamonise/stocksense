<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class Cliente extends Model {
    protected $table = 'clientes';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'cpf', 'endereco', 'telefone', 'email', 'empresa_id'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

}