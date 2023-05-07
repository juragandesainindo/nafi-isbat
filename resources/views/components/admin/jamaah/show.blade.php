@extends('layouts.master')

@section('title','Detail Jamaah')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@yield('title') <span class="text-capitalize">({{
                                    $jamaah->nama_jamaah }})</span></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>Nama</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="{{ $jamaah->nama_jamaah }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>Alamat</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="{{ $jamaah->alamat_jamaah }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>HP</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="{{ $jamaah->hp_jamaah }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>Jenis Kelamin</h6>
                                        </div>
                                        <div class="col-lg-9">

                                            <input type="radio" name="jk" value="L" id="laki_laki" {{ $jamaah->jk == 'L'
                                            ? 'checked'
                                            : '' }}>
                                            <label for="laki_laki">Laki-Laki</label>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="jk" value="P" id="perempuan" {{ $jamaah->jk == 'P'
                                            ? 'checked'
                                            : '' }}>
                                            <label for="perempuan">Perempuan</label>

                                            @error('jk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>NIK KTP/SIM</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" value="{{ $jamaah->nik }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>Pemimpin</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                value="{{ $jamaah->user->title }} {{ $jamaah->user->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3">
                                            <h6>Wilayah</h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control"
                                                value="{{ $jamaah->wilayah->nama_wilayah }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mt-4 mb-3">
                                            <h6>Foto Diri</h6>
                                            <div class="card">
                                                <div class="card-content">
                                                    @if ($jamaah->foto == Null)
                                                    <div class="card py-2 px-2 text-center"
                                                        style="border:1px solid #ddd;">
                                                        Foto Not Found
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('assets/images/jamaah/foto/'.$jamaah->foto) }}"
                                                        class="card-img-top img-fluid" alt="singleminded">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-4 mb-3">
                                            <h6>KTP</h6>
                                            <div class="card">
                                                <div class="card-content">
                                                    @if ($jamaah->ktp == Null)
                                                    <div class="card py-2 px-2 text-center"
                                                        style="border:1px solid #ddd;">
                                                        KTP Not Found
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('assets/images/jamaah/ktp/'.$jamaah->ktp) }}"
                                                        class="card-img-top img-fluid" alt="singleminded">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection