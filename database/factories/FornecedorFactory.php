<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company(),
            'cnpj' => $this->faker->numberBetween(1,10000),
            'email' => $this->faker->email(),
            'telefone' => $this->faker->phoneNumber(),
            'idade' => $this->faker->numberBetween(18,100),
            'endereco' => $this->faker->address(),
            'senha' => $this->faker->password(),
        ];
    }
}
