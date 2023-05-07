@extends('layouts.base')

@section('title','Home')

@section('nav-top')
<span class="nav-title">@yield('title')</span>
<div class="nav-right">
    <div class="dropdown">
        <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{{ Auth::user()->title }} {{ Auth::user()->name }}</span>
            <img src="{{ asset('assets/images/icons/profile.png') }}">
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="bi bi-person"></i>&nbsp;
                    Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logout">
                    <i class="bi bi-box-arrow-right"></i>&nbsp;
                    Log Out
                </a>
            </li>


        </ul>
    </div>
</div>
@endsection