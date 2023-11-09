<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtotipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'tipo_id'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
