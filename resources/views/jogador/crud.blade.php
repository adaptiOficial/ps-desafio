{{-- @extends('layouts.app', ['activePage' => 'suavariavel', 'titlePage' => __('suavariavel')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="form-member" method="POST" class="form-horizontal"
                        action="{{ isset($SUAVARIAVELSINGULAR) ? route('SUAVARIAVELSINGULAR.update', $SUAVARIAVELSINGULAR->id) : route('SUAVARIAVELSINGULAR.store') }}"
                        enctype="multipart/form-data">

                        @csrf
                        @isset($SUAVARIAVELSINGULAR)
                            @method("PUT")
                        @else
                            @method("POST")
                        @endisset

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">
                                    {{ isset($SUAVARIAVELSINGULAR) ? __('Edit SUAVARIAVELSINGULAR') : __('Create SUAVARIAVELSINGULAR') }}
                                </h4>
                                <p class="card-category">{{ __('SUAVARIAVELSINGULAR information') }}</p>
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
                                @component('admin.SUAVARIAVELSINGULAR.form', ['SUAVARIAVELSINGULAR' => isset($SUAVARIAVELSINGULAR) ? $SUAVARIAVELSINGULAR : null])
                                @endcomponent
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                <a href="{{ route('SUAVARIAVELSINGULAR.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection --}}
