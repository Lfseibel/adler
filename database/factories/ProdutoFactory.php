<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Medida;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'fornecedor_id' => Fornecedor::factory(),
            'valor' => $this->faker->numberBetween(20,100),
            'descricao' => $this->faker->text(30),
            'categoria_id' => Categoria::factory(),
            'medida_id' => Medida::factory(),
        ];
    }
}
