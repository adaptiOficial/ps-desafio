@extends('layouts.app', ['activePage' => 'user', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="form-member" method="POST" class="form-horizontal"
                        action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}"
                        enctype="multipart/form-data">

                        @csrf
                        @isset($user)
                            @method("PUT")
                        @else
                            @method("POST")
                        @endisset

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ isset($user) ? __('Edit User') : __('Create User') }}</h4>
                                <p class="card-category">{{ __('User information') }}</p>
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
                                @component('admin.user.form', ['user' => isset($user) ? $user : null])
                                @endcomponent
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Voltar</a>
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
