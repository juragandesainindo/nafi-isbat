@extends('layouts.master')

@section('title','Edit Wilayah')

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
                    <a href="{{ route('wilayah.index') }}" class="btn btn-outline-secondary btn-sm"><i
                            class="bi bi-backspace"></i> Kembali</a>
                </div>
                <form action="{{ route('wilayah.update',['id'=>$wilayah->id, 'slug'=>$wilayah->slug]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6>Nama Wilayah</h6>

                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="nama_wilayah" class="form-control @error('nama_wilayah') is-invalid
                            @enderror" value="{{ old('nama_wilayah') ?? $wilayah->nama_wilayah }}" placeholder="nama"
                                        required autofocus>

                                    @error('nama_wilayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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