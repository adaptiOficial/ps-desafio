<?php

namespace App\Http\Controllers;
use App\Http\Requests\categoriaRequest;
use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    private $categorias;
    public function __construct(Categoria $categoria){
        $this -> categorias = $categoria;
    }
    public function index()
    {
        $categorias = $this -> categorias -> all();
        return view('categoria.index',compact('categorias'));
    }


    public function create()
    {
        return view('categoria.crud');
    }


    public function store(categoriaRequest $request)
    {
        $data = $request -> all();
        $this -> categorias -> create($data);
        return redirect()->route('categoria.index')->with('Sucess','Categoria criada!');
    }

    public function show($id)
    {
        $categoria = $this -> categorias -> find($id);
        return response()->json($categoria);
    }

    public function edit($id)
    {
        $categoria = $this -> categorias -> find($id);
        return view('categoria.crud',compact('categoria'));

    }

    public function update(Request $request, $id)
    {
        $data = $request -> all();
        $categoria = $this -> categorias -> find($id);
        $categoria -> update($data);
        return redirect() -> route('categoria.index')->with('Sucesso','Categoria modificada!');
    }

    public function destroy($id)
    {
        $categoria = $this -> categorias -> find($id);
        $categoria -> delete();
        return redirect() -> route('categoria.index')->with('Sucesso','Categoria deletada!');
    }
}
