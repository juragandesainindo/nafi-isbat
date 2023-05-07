@extends('layouts.base')

@section('title','Jamaah')

@section('nav-top')
<span class="nav-title">@yield('title')</span>
@endsection

@section('content')
<section class="content">

    <div class="row">
        <div class="container">
            <div class="alert alert-primary" role="alert">
                <div>
                    <span class="text-sm">
                        Berikut daftar wilayah pertawajuhan yang ada. Jika ingin menambahkan lagi wilayah baru, bisa
                        langsung ke menu Wilayah untuk buat baru. Atau <a href="{{ route('wilayah.create') }}"
                            class="fw-bold">klik link
                            ini</a>.
                    </span>
                </div>
            </div>
        </div>

        @foreach ($wilayah as $key => $item)
        <div class="col-6 mb-3">
            <div class="card">
                <a href="{{ route('jamaah.show',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                    class="text-decoration-none text-black">
                    <div class="card-header border-success w-100 text-center text-white" style="line-height: 2rem;">
                        {{ $item->nama_wilayah }} <span class="badge bg-white">{{ $item->jamaah->count() }}</span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach

    </div>

</section>

@endsection