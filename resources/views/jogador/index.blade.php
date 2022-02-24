@extends('layouts.app', ['activePage' => 'jogador-management', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="float-right" href="{{ route('jogador.create') }}">
                                <button type="button" title="{{ __('Add jogador') }}" class="btn btn-primary add-button">
                                    <i class="material-icons">add_circle_outline</i>{{ __('Add jogador') }}
                                </button>
                            </a>
                            <h4 class="card-title ">{{ __('Jogador') }}</h4>
                            <p class="card-category">{{ __('Lista de todos os jogadores') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ __('Nome') }}
                                        </th>
                                        <th>
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($jogadores as $jogador)
                                            <tr>
                                                <td>{{ $jogador->id }}</td>
                                                <td>{{ $jogador->nome }}</td>
                                                <td>
                                                    <!-- botao editar -->
                                                    <a href="{{ route('jogador.edit', $jogador->id) }}">
                                                        <button type="button" title="{{ __('Edit') }}"
                                                            class="btn btn-warning">
                                                            <i class="material-icons" style="color: white">edit</i>
                                                        </button>
                                                    </a>
                                                    <!-- Botao apagar -->
                                                    <button type="button" title="{{ __('Delete') }}" data-toggle="modal"
                                                        data-target="#modal-excluir" data-id="{{ $jogador->id }}"
                                                        class="btn btn-danger">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <!-- Botao visualizar -->
                                                    <button type="button" title="{{ __('Visualizar') }}"
                                                        data-toggle="modal" data-target="#modal-detalhes"
                                                        data-id="{{ $jogador->id }}" class="btn btn-danger">
                                                        <i class="material-icons">visibility</i>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal excluir -->
        <div id="modal-excluir" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-12 text-dark" id="serviceModalLabel">Confirmação</h5>
                    </div>
                    <div class="modal-body" align="center">Tem certeza de que quer excluir esse Jogador?
                    </div>
                    <div id="excluir-associate" style="text-align: center"></div>
                    <style type="text/css">
                        p.bold-red {
                            color: red;
                            font-weight: bold;
                        }

                    </style>
                    <div class="modal-footer">
                        <form id="form-excluir" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')


                        </form>
                        <button type="submit" form="form-excluir" class="btn btn-danger">Excluir</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal visualizar -->

        <div id="modal-detalhes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-12 text-dark" id="serviceModalLabel">Visualização do Jogador</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nome">Nome</label>
                                <input type="text" id="detalhes-nome" name="detalhes-nome" class="form-control" readonly>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label for="data">Data de nascimento</label>
                                <input type="text" id="detalhes-datadenascimento" name="detalhes-datadenascimento"
                                    class="form-control" readonly>
                            </div>

                            <img id="detalhes-imagem" class="form-group col-md-6 col-sm-12" />

                        </div>
                    </div>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <!-- Scripts Here -->
    <script>
        /* js para abrir Modal de Detalhes de forma dinâmica com as informações desejadas */
        $('#modal-detalhes').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            let modal = $(this)
            const id = button.data('id')
            const url = 'jogador/' + id
            $.getJSON(url, (resposta) => {
                console.log(resposta);
                $("#detalhes-nome").val(resposta.nome);
                $("#detalhes-datadenascimento").val(resposta.data);
                $("#detalhes-imagem").attr('src', '/storage/' + resposta.imagem);
            });
        })
        /* js para abrir Modal de excluir de forma dinâmica */
        $('#modal-excluir').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            const id = button.data('id')
            const url2 = 'jogador/' + id
            $('#form-excluir').attr('action', 'jogador/' + id)
        })
    </script>
@endpush
