<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class PlacasMaeController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('site.placas-mae', compact('produtos', 'categorias'));
    }
}
