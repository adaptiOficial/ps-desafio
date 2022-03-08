<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\ProdutoStoreRequest;
use App\Http\Requests\ProdutoRequest;
use App\Http\Requests\ProdutoUpdateRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    private $produtos;

    public function __construct(Produto $produto) //Inicia o objeto com o seu modelo
    {
        $this->produtos = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdutoRequest $request)
    {
        $produtos = $this->produtos->all();
        return view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.crud', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProdutoStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoStoreRequest $request)
    {
        $datas = $request->all();
        $datas['imagem'] = $request->file('imagem')->store('/produtosIMG', ['disk' => 'public']);

        $produto = $this->produtos->create($datas);

        $log = [
            'id' => $produto->id,
            'name' => $produto->nome,
            'text' => 'cadastrou um novo produto',
            'category' => 'Produtos'
        ];

        $this->doLogs($log); //função de controller.php que cria os logs

        return redirect(route('produto.index'))->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoRequest $request, $id)
    {
        $produto = $this->produtos->find($id);
        $produto['categoria'] = $produto->categoria()->pluck('categoria')->first();
        return json_encode($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoRequest $request, $id)
    {
        $produto = $this->produtos->find($id);
        $categorias = Categoria::all();
        return view('produto.crud', compact('produto'), compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProdutoUpdateRequest  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoUpdateRequest $request, $id)
    {
        $datas = $request->all();
        $produto = $this->produtos->find($id);

        if ($request->hasFile('imagem'))
        {
            Storage::delete('public/' . $produto->imagem);
            $datas['imagem'] = $request->file('imagem')->store('/produtosIMG', ['disk' => 'public']);
        }

        $produto->update($datas);

        $log = [
            'id' => $produto->id,
            'name' => $produto->nome,
            'text' => 'alterou o produto',
            'category' => 'Produtos'
        ];

        $this->doLogs($log); //função de controller.php que cria os logs

        return redirect(route('produto.index'))->with('success', 'Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoRequest $request, $id)
    {
        $produto = $this->produtos->find($id);

        Storage::delete('public/' . $produto->imagem);
        $produto->delete();

        $log = [
            'id' => $produto->id,
            'name' => $produto->nome,
            'text' => 'excluiu o produto',
            'category' => 'Produtos'
        ];

        $this->doLogs($log); //função de controller.php que cria os logs

        return redirect(route('produto.index'))->with('success', 'Produto excluído com sucesso!');
    }
}
