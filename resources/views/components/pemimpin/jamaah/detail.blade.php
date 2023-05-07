@extends('layouts.base')

@section('nav-top')
<span class="nav-title">
    <a href="{{ route('jamaah.show',['id'=>$jamaah->wilayah->id, 'slug'=>$jamaah->wilayah->slug]) }}">
        <i class="bi bi-arrow-left"></i>&nbsp; @yield('title') {{ $jamaah->nama_jamaah }}
    </a>
</span>
@endsection