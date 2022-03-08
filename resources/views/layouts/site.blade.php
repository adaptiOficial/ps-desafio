<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Produtos') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="produtosCSS/indexCSS.css">
    <script src="https://kit.fontawesome.com/f0254b55c2.js" crossorigin="anonymous"></script>
</head>

<body id = "body">
    @yield('content') {{-- adiciona o body --}}
</body>

@include('layouts.footers.adapti') {{-- cria a classe footer --}}

</html>