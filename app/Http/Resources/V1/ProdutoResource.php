<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'valor' => $this->valor,
            'descricao' => $this->descricao,
            'categoriaId' => $this->categoria_id,
            'medidaId' => $this->medida_id,
            'fornecedorId' => $this->fornecedor_id,
            'tipos' => $this->tipos()->count(),
        ];
    }
}
