@extends('layouts.app', ['activePage' => 'nacionalidade', 'titlePage' => __('Nacionalidades')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="form-member" method="POST" class="form-horizontal"
                        action="{{ isset($nacionalidade) ? route('nacionalidade.update', $nacionalidade->id) : route('nacionalidade.store') }}"
                        enctype="multipart/form-data">

                        @csrf
                        @isset($nacionalidade)
                            @method("PUT")
                        @else
                            @method("POST")
                        @endisset

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">
                                    {{ isset($nacionalidade) ? __('Edit nacionalidade') : __('Create Nacionalidade') }}
                                </h4>
                                <p class="card-category">{{ __('Nacionalidade information') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @component('nacionalidade.formulario', ['nacionalidade' => isset($nacionalidade) ?
                                    $nacionalidade : null])
                                @endcomponent
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                <a href="{{ route('nacionalidade.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection
