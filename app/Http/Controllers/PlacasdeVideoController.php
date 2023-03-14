<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class PlacasdeVideoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('site.placas-de-video', compact('produtos', 'categorias'));
    }
}
