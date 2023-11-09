<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    protected $fillable = [
        'conteudo',
        'data',
        'cliente_id',
        'fornecedor_id'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
