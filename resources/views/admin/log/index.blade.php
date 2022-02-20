@extends('layouts.app', ['activePage' => 'log-list', 'titlePage' => __('Logs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Logs') }}</h4>
                            <p class="card-category">{{ __('System Audit Record') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            {{ __('Category') }}
                                        </th>
                                        <th>
                                            {{ __('Message') }}
                                        </th>
                                        <th>
                                            {{ __('Date') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>{{ $log->category }}</td>
                                                <td>{{ $log->log }}</td>
                                                <td>{{ $log->created_at }}</td>
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
    </div>
@endsection
