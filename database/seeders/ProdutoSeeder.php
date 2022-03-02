<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            [
                'nome' => 'Hamburger Vegano',
                'preco' => 30.00,
                'descricao' => 'Pão, burguer do futuro, cheddar vegetal, alface e tomate.',
                'quantidade' => 5,
                'imagem' => 'vegano.jpg',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Hamburger Gourmet',
                'preco' => 29.50,
                'descricao' => 'Pão, burguer 200g, cheddar, bacon, alface e tomate.',
                'quantidade' => 5,
                'imagem' => 'gourmet.jpg',
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Hamburger Tradicional',
                'preco' => 18.00,
                'descricao' => 'Pão, burguer industrial, mussarela, alface e tomate.',
                'quantidade' => 5,
                'imagem' => 'tradicional.png',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
