@extends('layouts.site.site')
@section('titulo')
    Processadores
@endsection

@section('conteudo')
    <div id="content-total">
        <div class="produtos">
            <h1 id="nossos-produtos">PROCESSADORES</h1>
            @isset($produtos)
                @if (count($produtos))
                    @foreach ($produtos as $produto)
                        @if ($produto->categoria_id == 1)
                            <div class="each-product">
                                <p class="categoria">Categoria: {{ $produto->categoria->categoria }}</p>
                                <div class="image-container">
                                    <img src="/storage/{{ $produto->imagem }}">
                                </div>
                                <div class="info-produto">
                                    <p class="nome-produto">{{ $produto->nome }}</p>
                                    <p class="preco">PREÇO: R${{ $produto->preco }},00</p>
                                    <p class="estoque">EM ESTOQUE: {{ $produto->quantidade }} UNIDADES</p>
                                    <button class="btn-visualizar">
                                        <span>VISUALIZAR DESCRIÇÃO</span>
                                    </button>
                                    <p class="descricao" style="display: none">{{ $produto->descricao }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endisset

        </div>
    </div>
    </div>
@endsection
