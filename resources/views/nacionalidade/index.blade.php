@extends('layouts.app', ['activePage' => 'nacionalidade-management', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="float-right" href="{{ route('nacionalidade.create') }}">
                                <button type="button" title="{{ __('Add Nacionalidade') }}"
                                    class="btn btn-primary add-button">
                                    <i class="material-icons">add_circle_outline</i>{{ __('Add Nacionalidade') }}
                                </button>
                            </a>
                            <h4 class="card-title ">{{ __('Nacionalidade') }}</h4>
                            <p class="card-category">{{ __('Lista de todas nacionalidades') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ __('Nacionalidade') }}
                                        </th>
                                        <th>
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($nacionalidades as $nacionalidade)
                                            <tr>
                                                <td>{{ $nacionalidade->id }}</td>
                                                <td>{{ $nacionalidade->nacionalidade }}</td>
                                                <td>
                                                    <!-- botao editar -->
                                                    <a href="{{ route('nacionalidade.edit', $nacionalidade->id) }}">
                                                        <button type="button" title="{{ __('Edit') }}"
                                                            class="btn btn-warning">
                                                            <i class="material-icons" style="color: white">edit</i>
                                                        </button>
                                                    </a>
                                                    <!-- Botao apagar -->
                                                    <button type="button" title="{{ __('Delete') }}" data-toggle="modal"
                                                        data-target="#modal-excluir" data-id="{{ $nacionalidade->id }}"
                                                        class="btn btn-danger">
                                                        <i class="material-icons">close</i>
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
                    <div class="modal-body" align="center">Tem certeza de que quer excluir essa Nacionalidade?</div>
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
            const url = 'nacionalidade/' + id
            $.getJSON(url, (resposta) => {

            });
        })
        /* js para abrir Modal de excluir de forma dinâmica */
        $('#modal-excluir').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            const id = button.data('id')
            const url2 = 'nacionalidade/' + id
            $('#form-excluir').attr('action', 'nacionalidade/' + id)
        })
    </script>
@endpush
