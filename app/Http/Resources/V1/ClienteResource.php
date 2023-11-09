<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'idade' => $this->cnpj,
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'senha' => $this->senha,
            'imagem_perfil' => $this->imagem_perfil,
            'eventos' => EventoResource::collection($this->whenLoaded('eventos')),
            'pedidos' => PedidoResource::collection($this->whenLoaded('pedidos'))
        ];
    }
}
