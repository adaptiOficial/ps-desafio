@extends('layouts.site.site')
@section('titulo')
    Hasty Hardware
@endsection

@section('conteudo')
    <div id="content-total">
        <h1 id="nossas-categorias">
            CATEGORIAS
        </h1>
        <div class="cards">
            <div class="card">
                <a href="{{ url('processadores') }}">
                    <img src="{{ asset('site/img/PROCESSADORES.png') }}" alt="Processadores">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('placas-mae') }}">
                    <img src="{{ asset('site/img/PLACA-MAE.png') }}" alt="Placas-Mãe">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('placas-de-video') }}">
                    <img src="{{ asset('site/img/PLACA-DE-VIDEO.png') }}" alt="Placas de Vídeo">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('memoria') }}">
                    <img src="{{ asset('site/img/MEMORIA.png') }}" alt="Memória">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('armazenamento') }}">
                    <img src="{{ asset('site/img/ARMAZENAMENTO.png') }}" alt="Armazenamento">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('fontes') }}">
                    <img src="{{ asset('site/img/FONTES.png') }}" alt="Fontes">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('teclados') }}">
                    <img src="{{ asset('site/img/TECLADOS.png') }}" alt="Teclados">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('mouses') }}">
                    <img src="{{ asset('site/img/MOUSES.png') }}" alt="Mouses">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('monitores') }}">
                    <img src="{{ asset('site/img/MONITORES.png') }}" alt="Monitores">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('refrigeracao') }}">
                    <img src="{{ asset('site/img/REFRIGERACAO.png') }}" alt="Refrigeração">
                </a>
            </div>

            <div class="card">
                <a href="{{ url('gabinetes') }}">
                    <img src="{{ asset('site/img/GABINETES.png') }}" alt="Gabinetes">
                </a>
            </div>
            <div class="card">
                <a href="{{ url('gabinetes') }}">
                    <img src="{{ asset('site/img/HEADSETS.png') }}" alt="Headsets">
                </a>
            </div>
        </div>

        <div class="produtos">
            <h1 id="nossos-produtos">PRODUTOS</h1>
            @isset($produtos)
                @if (count($produtos))
                    @foreach ($produtos as $produto)
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
                    @endforeach
                @endif
            @endisset
        </div>
    </div>

@endsection
