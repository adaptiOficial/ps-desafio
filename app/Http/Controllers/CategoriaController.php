<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;

class CategoriaController extends Controller
{
    private $categorias;

    public function __construct(Categoria $categoria) //Inicia o objeto com o seu modelo
    {
        $this->categorias = $categoria;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriaRequest $request)
    {
        $categorias = $this->categorias->all();
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoriaStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaStoreRequest $request)
    {
        $datas = $request->all();
        $categoria = $this->categorias->create($datas);

        $log = [
            'id' => $categoria->id,
            'name' => $categoria->categoria,
            'text' => 'cadastrou uma nova categoria',
            'category' => 'Categorias'
        ];

        $this->doLogs($log); //função de controller.php que cria os logs

        return redirect(route('categoria.index'))->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaRequest $request, $id)
    {
        $categoria = $this->categoria->find($id);

        return json_encode($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaRequest $request, $id)
    {
        $categoria = $this->categorias->find($id);
        return view('categoria.crud', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoriaUpdateRequest  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaUpdateRequest $request, $id)
    {
        $datas = $request->all();
        $categoria = $this->categorias->find($id);

        $categoria->update($datas);

        $log = [
            'id' => $categoria->id,
            'name' => $categoria->categoria,
            'text' => 'alterou a categoria',
            'category' => 'Categorias'
        ];

        $this->doLogs($log); //função de controller.php que cria os logs

        return redirect(route('categoria.index'))->with('success', 'Categoria alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaRequest $request, $id)
    {
        $categoria = $this->categorias->find($id);

        $categoria->delete();

        $log = [
            'id' => $categoria->id,
            'name' => $categoria->categoria,
            'text' => 'excluiu a categoria',
            'category' => 'Categorias'
        ];

        $this->doLogs($log); //função de controller.php que cria os logs

        return redirect(route('categoria.index'))->with('success', 'Categoria excluída com sucesso!');
    }
}
