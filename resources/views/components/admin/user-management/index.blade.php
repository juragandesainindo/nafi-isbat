@extends('layouts.master')

@section('title','User Management')

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
                    <h3>User Management</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('user-management.create') }}" class="btn btn-primary"><i
                            class="bi bi-plus-circle"></i> Tambah User</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>HP</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->hp }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Deactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user-management.edit',$item->id) }}"
                                        class="btn btn-primary btn-sm" title="Edit user"><i
                                            class="bi bi-pencil"></i></a>
                                    <a href="{{ route('user-management.edit-password',$item->id) }}"
                                        class="btn btn-warning btn-sm" title="Edit password"><i
                                            class="bi bi-lock"></i></a>
                                </td>
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