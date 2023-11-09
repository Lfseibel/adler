<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Medida;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fornecedor::factory()
        //     ->count(5)
        //     ->hasProdutos(10)
        //     ->create();
        Fornecedor::factory()
        ->count(5)
        ->has(Produto::factory()->count(10)->for(Categoria::factory())->for(Medida::factory()))
        ->create();

        Fornecedor::factory()
        ->count(5)
        ->has(Produto::factory()->count(10)->for(Categoria::factory())->for(Medida::factory()))
        ->create();
    }
}
