<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Nacionalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class JogadorController extends Controller
{
    private $jogadores;
    private $nacionalidades;

    public function __construct(Jogador $jogadores, Nacionalidade $nacionalidades)
    {
        $this->jogadores = $jogadores;
        $this->nacionalidades = $nacionalidades;
    }

    public function index()
    {
        $jogadores = $this->jogadores->all();
        return view('jogador.index', compact('jogadores'));
    }


    public function create()
    {
        $nacionalidades = $this->nacionalidades->all();
        return view('jogador.crud', compact('nacionalidades'));
    }


    public function store(Request $request)
    {
        $jogador = new Jogador();
        $jogador->nome = $request->input('nome');
        $jogador->data = $request->input('data');
        $imagem = $request->file('imagem')->store('jogadores', 'public');
        $jogador->imagem = $imagem;
        $jogador->nacionalidades_id = $request->input('nacionalidades_id');

        $jogador->save();

        return redirect('jogador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogador = $this->jogadores->find($id);

        return json_encode($jogador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = $this->jogadores->find($id);
        $nacionalidades = $this->nacionalidades->all();

        return view('jogador.crud', compact(['jogador', 'nacionalidades']));
    }


    public function update(Request $request, $id)
    {
        $datas = $request->all();
        $jogador = $this->jogadores->find($id);


        //Verificando se o arquivo de imagem é valido
        if ($request->hasFile('imagem')) {
            Storage::delete('public/' . $jogador->imagem); //excluindo a imagem
            $datas['imagem'] = $request->file('imagem')->store('jogadores', 'public');
        }


        $jogador->update($datas);

        return redirect('jogador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jogador = $this->jogadores->find($id);
        Storage::drive('public')->delete($jogador->imagem);

        $jogador->delete();

        return redirect(route('jogador.index'));
    }
}
