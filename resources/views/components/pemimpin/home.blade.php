@extends('layouts.base')

@section('title','Home')

@section('content')
<section class="content">

    @section('nav-top')
    <span class="nav-title">@yield('title')</span>
    @endsection

    <div class="content-title">
        <span>Selamat datang,
            <strong>{{ Auth::user()->title }} {{ Auth::user()->name }}</strong>
        </span>
        <div class="dropdown-divider"></div>
        <p class="mt-2"><strong>SINAFIS App</strong> merupakan aplikasi untuk merekap data
            jamaah, silahakan
            untuk menginput data
            <strong><a href="{{ url('wilayah') }}">Wilayah</a></strong> dan
            data <strong><a href="{{ url('jamaah') }}">Jamaah</a></strong>.
        </p>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <div class="alert alert-primary" role="alert">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill"></i>&nbsp;
                    <div>
                        Total Jamaah
                    </div>
                </div>
                <div class="fw-bold text-center fs-3">
                    {{ $jamaah }}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="alert alert-success" role="alert">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-geo-alt-fill"></i>&nbsp;
                    <div>
                        Total Wilayah
                    </div>
                </div>
                <div class="fw-bold text-center fs-3">
                    {{ $wilayah }}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection