<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'categoria' => 'Gourmet - Vegano',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria' => 'Gourmet',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria' => 'Tradicional',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
