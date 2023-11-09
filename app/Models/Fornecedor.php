<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'cnpj',
        'senha',
        'email',
        'endereco',
        'idade',
        'imagemPerfil',
        'telefone'
    ];


    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
