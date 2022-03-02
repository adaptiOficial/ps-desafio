<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Produto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([CategoriaSeeder::class]);
        $this->call([ProdutoSeeder::class]);

        Categoria::factory()->count(5)->create();
        Produto::factory()->count(5)->create();
    }
}
