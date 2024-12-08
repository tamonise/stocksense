<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class Estoque extends Model {
    protected $table = 'estoques';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'idEmpresa'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    public function itensCompra() {
        return $this->hasMany(ItemCompra::class);
    }

}