@extends('layouts.base')

@section('title','Tambah Jamaah')

@section('nav-top')
<span class="nav-title">
    <a href="{{ route('jamaah.show',['id'=>$wilayah->id,'slug'=>$wilayah->slug]) }}">
        <i class="bi bi-arrow-left"></i>&nbsp; @yield('title')
    </a>
</span>
@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jamaah.storePemimpin', ['id'=>$wilayah->id, 'slug'=>$wilayah->slug]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="form-group mb-3">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <label>Nama <sup class="text-danger">***</sup></label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="nama_jamaah" value="{{ old('nama_jamaah') }}" class="form-control @error('nama_jamaah') is-invalid
                                                                @enderror" placeholder="nama" required autofocus>

                                @error('nama_jamaah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <label>Alamat</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="alamat_jamaah" value="{{ old('alamat_jamaah') }}" class="form-control @error('alamat_jamaah') is-invalid
                                                                @enderror" placeholder="alamat">

                                @error('alamat_jamaah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <label>HP <sup class="text-danger">***</sup></label>
                            </div>
                            <div class="col-9">
                                <input type="number" name="hp_jamaah" value="{{ old('hp_jamaah') }}" class="form-control @error('hp_jamaah') is-invalid
                                                                @enderror" placeholder="hp" required>

                                @error('hp_jamaah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-9">
                                <input type="radio" name="jk" value="L" id="laki_laki" checked>
                                <label for="laki_laki">Laki-Laki</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="jk" value="P" id="perempuan">
                                <label for="perempuan">Perempuan</label>
                                @error('jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <label>NIK KTP/SIM</label>
                        </div>
                        <div class="col-9">
                            <input type="number" name="nik" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid
                                                                                @enderror" placeholder="nik ktp/sim">

                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ $wilayah->user->id }}">
                <input type="hidden" name="wilayah_id" value="{{ $wilayah->id }}">

                <div class="form-group mb-3">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <label>Foto Diri</label>
                        </div>
                        <div class="col-9">
                            <input type="file" name="foto" value="{{ old('foto') }}"
                                class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <label>KTP</label>
                        </div>
                        <div class="col-9">
                            <input type="file" name="ktp" value="{{ old('ktp') }}"
                                class="form-control @error('ktp') is-invalid @enderror">
                            @error('ktp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type=" submit" class="btn btn-submit w-100 mt-4">
                    Simpan</button>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <span>Keterangan</span> <br>
        <span class="text-danger">(***) tanda bintang 3, inputan harus diisi</span>
    </div>
</section>
@endsection