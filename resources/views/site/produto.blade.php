@extends('layouts.site')

@section('content')

<header class = "header">
    <div id = "header-container">
        <div class = "sB-container">
            <input type = "text" id = "searchBar" placeholder = "Pesquise pelo nome" autocomplete = "off">
            <span id = "fake-button" class="material-icons">search</span>
        </div>

        <div class = "menu-filtro">
            <input type="checkbox" id = "checkbox-menu" onchange = "showFilter(this)">
            <label id = "label-menu" for="checkbox-menu">
                <span class = "line1"></span>
                <span class = "line2"></span>
                <span class = "line3"></span>
            </label>
        </div>

        <div id = "fC" class = "filtro-container">
            <h4 class = "filter-titulo">{{__("Filtrar por Categoria(as): ")}}</h4>
            @foreach($categorias as $categoria)
                <div class = "categoria-container">
                    <input type="checkbox" id = "{{$categoria->categoria}}" name="{{$categoria->categoria}}" class = "checkbox" onchange = "filterCB(this)">
                    <label for="{{$categoria->categoria}}">{{$categoria->categoria}}</label>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
</header>

<section class = "produtos">
    @foreach($produtos as $produto)
        <div class = "produto">
            <h4 class = "categorias">{{$produto->categoria}}</h4>
            <h3 class = "nomes">{{$produto->nome}}</h3>
            <img src="{{asset($produto->imagem)}}" alt="{{__('Imagem de: ') . $produto->nome}}">
            <p>{{$produto->descricao}}</p>
            <div class = "container-QtdeVal">
                <h4>{{__('Qtde.: ') . $produto->quantidade}}</h4>
                <h4>{{$produto->preco == "Esgotado" ? $produto->preco : __('R$ ') . $produto->preco}}</h4>
            </div>
        </div>
    @endforeach
</section>

<script src="{{asset('produtosJS')}}/seachbar.js"></script>
<script src="{{asset('produtosJS')}}/filtroMenu.js"></script>