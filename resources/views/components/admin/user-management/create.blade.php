@extends('layouts.master')

@section('title','Tambah User')

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
                <div class="card-header">
                    <a href="{{ route('user-management.index') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-backspace"></i> Kembali</a>
                </div>
                <form action="{{ route('user-management.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Title</h6>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select class="choices form-select" name="title">
                                            <option value="KhB">KhB</option>
                                            <option value="Kh">Kh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Nama</h6>

                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid
                            @enderror" value="{{ old('name') }}" placeholder="nama" required autofocus>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Username</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="username" class="form-control @error('username') is-invalid
                            @enderror" value="{{ old('username') }}" placeholder="username" required>

                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>HP</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" name="hp" class="form-control @error('hp') is-invalid
                            @enderror" value="{{ old('hp') }}" placeholder="hp" required>

                                    @error('hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Role</h6>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select class="choices form-select" name="role">
                                            <option value="">-- Pilih role --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pemimpin">Pemimpin</option>
                                            <option value="Koordinator">Koordinator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Status</h6>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select class="choices form-select" name="status">
                                            <option value="">-- Pilih status --</option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Password</h6>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid
                                                                    @enderror" placeholder="password" required>

                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </form>
            </div>

        </section>
    </div>
</div>

@endsection