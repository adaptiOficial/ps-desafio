<?php

namespace App\Http\Controllers;

use App\Http\Requests\produtoRequest;
use App\Http\Requests\Update_produtoRequest;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{

    private $produtos;
    private $categorias;

    public function __construct(Produto $produtos,Categoria $categorias){
        $this -> produtos = $produtos;
        $this -> categorias = $categorias;
    }

    public function index()
    {
        $produtos = $this -> produtos -> all();
        return view('produto.index',compact('produtos'));
    }


    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categorias = $this -> categorias -> all();
        return view('produto.crud',compact('categorias'));
    }


    public function store(produtoRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request -> all();
        $data['imagem'] = ''.$request->file('imagem')->store('imagens','public');
        $this -> produtos -> create($data);
        return redirect()->route('produto.index')->with('success','Produto Adicionado!');
    }


    public function show($id): \Illuminate\Http\JsonResponse
    {
        $produto = $this -> produtos ->find($id);
        $produto -> load('Categoria');
        return response()->json($produto);
    }


    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $produto = $this -> produtos ->find($id);
        $categorias = $this -> categorias -> all();
        return view('produto.crud',compact('produto','categorias'));
    }


    public function update(Update_produtoRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request -> all();
        $produto = $this -> produtos -> find($id);
        if($request->hasFile('imagem')){
            Storage::disk('public')->delete(substr($produto->image,9));
            $data['imagem'] = ''.$request->file('imagem')->store('imagens','public');
        }
        $produto -> update($data);
        return redirect()->route('produto.index')->with('success','Produto Modificado!');

    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $produto = $this -> produtos -> find($id);
        storage::disk('public')->delete(substr($produto->imagem,9));
        $produto -> delete();
        return redirect()->route('produto.index')->with('success','Produto Excluído!');
    }
}
