@extends('layouts.master')

@section('title','Edit Password User')

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
                <form action="{{ route('user-management.update-password',$user->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Password</h6>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid
                                                                    @enderror" placeholder="password" required
                                            autofocus>

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
                        <button type="submit" class="btn btn-primary w-100">Ubah</button>
                    </div>
                </form>
            </div>

        </section>
    </div>
</div>

@endsection