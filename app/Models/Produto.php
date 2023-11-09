<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
        'descricao',
        'fornecedor_id',
        'categoria_id',
        'medida_id',
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }

    public function imagens()
    {
        return $this->hasMany(Imagemproduto::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function tipos()
    {
        return $this->hasMany(Produtotipo::class);
    }
}
