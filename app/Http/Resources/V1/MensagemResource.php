<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MensagemResource extends JsonResource
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
            'conteudo' => $this->conteudo,
            'data' => $this->quantidade,
            'fornecedor_id' => $this->fornecedor_id,
            'cliente_id' => $this->cliente_id,
        ];
    }
}
