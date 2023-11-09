<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'senha',
        'email',
        'endereco',
        'idade',
        'imagemPerfil',
        'telefone'
    ];


    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
