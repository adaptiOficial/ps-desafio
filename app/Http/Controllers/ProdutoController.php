<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{
    private $produtos;
    private $categorias;

    public function __construct(Produto $produtos, Categoria $categorias)
    {
        $this->produtos = $produtos;
        $this->categorias = $categorias;
    }

    public function index()
    {
        $produtos = $this->produtos->all();
        return view('produto.index', compact('produtos'));
    }


    public function create()
    {
        $categorias = $this->categorias->all();
        return view('produto.crud', compact('categorias'));
    }


    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->preco = $request->input('preco');
        $produto->descricao = $request->input('descricao');
        $produto->quantidade = $request->input('quantidade');
        $imagem = $request->file('imagem')->store('produtos', 'public');
        $produto->imagem = $imagem;
        $produto->categoria_id = $request->input('categoria_id');

        $produto->save();

        return redirect('produto');
    }


    public function show($id)
    {
        $produto = $this->produtos->find($id);
        $categoria = $this->categorias->find($produto->categoria_id);
        return json_encode([$produto, $categoria]);
    }


    public function edit($id)
    {
        $produto = $this->produtos->find($id);
        $categorias = $this->categorias->all();

        return view('produto.crud', compact('produto', 'categorias'));
    }


    public function update(Request $request, $id)
    {
        $datas = $request->all();
        $produto = $this->produtos->find($id);

        if ($request->hasFile('imagem')) {
            Storage::delete('public/', $produto->imagem);
            $datas['imagem'] = $request->file('imagem')->store('produto', 'public');
        }

        $produto->update($datas);

        return redirect('produto');
    }

    public function destroy($id)
    {
        $produto = $this->produtos->find($id);
        Storage::drive('public')->delete($produto->imagem);
        $produto->delete();

        return redirect(route('produto.index'));
    }
}
