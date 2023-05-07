@extends('layouts.base')

@section('title','Tambah Wilayah')

@section('nav-top')
<span class="nav-title">
    <a href="{{ route('wilayah.index') }}">
        <i class="bi bi-arrow-left"></i>&nbsp; @yield('title')
    </a>
</span>
@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('wilayah.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Wilayah</label>
                    <input type="text" name="nama_wilayah" value="{{ old('nama_wilayah') }}" class="form-control @error('nama_wilayah') is-invalid
                                                            @enderror" id="namaWilayah"
                        placeholder="Input nama wilayah pertawajuhan" required autofocus>

                    @error('nama_wilayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-submit w-100 mt-4">
                    Simpan</button>
            </form>
        </div>
    </div>
</section>
@endsection