<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\ItemCompra;

class Estoque extends Model {
    protected $table = 'estoques';

    public $timestamps = true;

    protected $fillable = [
        'nome', 'empresa_id'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function itensCompra() {
        return $this->hasMany(ItemCompra::class);
    }

}