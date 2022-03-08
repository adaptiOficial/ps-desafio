<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

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
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'preco' => $this->faker->numberBetween(5, 100),
            'descricao' => $this->faker->sentence(5),
            'quantidade' => $this->faker->numberBetween(1, 100),
            'imagem' => str_replace("public/", '', $this->faker->image('public/produtosIMG')),
            'categoria_id' => $this->faker->numberBetween(1, Categoria::all()->last()->id),
        ];
    }
}
