@extends('layouts.master')

@section('title','Log Activity')

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>URL</th>
                                <th>Method</th>
                                <th>Ip</th>
                                <th>User Agent</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $key => $log)
                            <tr class="text-sm">
                                <td>{{ ++$key }}</td>
                                <td>{{ $log->subject }}</td>
                                <td>{{ $log->url }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $log->method }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-warning">{{ $log->ip }}</span>
                                </td>
                                <td>{{ $log->agent }}</td>
                                <td>{{ $log->user->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>

@endsection