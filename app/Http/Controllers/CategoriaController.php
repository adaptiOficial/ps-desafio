<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    private $categorias;
    public function __construct(Categoria $categorias)
    {
        $this->categorias = $categorias;
    }

    public function index()
    {
        $categorias = $this->categorias->all();
        return view('categoria.index', compact('categorias'));
    }


    public function create()
    {
        return view('categoria.crud');
    }


    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->categoria = $request->input('categoria');

        $categoria->save();
        return redirect('categoria');
    }

    public function edit($id)
    {
        $categoria = $this->categorias->find($id);
        return view('categoria.crud', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $this->categorias->find($id)->update(['categoria' => $request->input('categoria')]);
        return redirect('categoria');
    }

    public function destroy($id)
    {
        $categoria = $this->categorias->find($id);
        $categoria->delete();
        return redirect('categoria');
    }
}
