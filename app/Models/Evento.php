<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'cliente_id',
        'imagem',
        'status',
        'data'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }
}
