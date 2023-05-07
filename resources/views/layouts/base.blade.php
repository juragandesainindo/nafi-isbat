<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('assets/mobile/style.css') }}">
</head>

<body>

    @include('sweetalert::alert')

    <div class="app container">

        <nav class="navbar navbar-light navbar-expand fixed-bottom py-0 nav-bottom">
            <ul class="navbar-nav nav-justified w-100">
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i>
                        <span class="d-block">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('wilayah') }}" class="nav-link {{ request()->is('wilayah*') ? 'active' : '' }}">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span class="d-block">Wilayah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('jamaah') }}" class="nav-link {{ request()->is('jamaah*') ? 'active' : '' }}">
                        <i class="bi bi-person-fill"></i>
                        <span class="d-block">Jamaah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="d-block">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>

        @include('layouts.components.nav-bottom')

        <div class="nav-top container fixed-top d-flex justify-content-between align-items-center">
            @yield('nav-top')

        </div>

        @yield('content')


        <!-- Modal Log Out -->
        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin log out?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            Pastikan semua aktivitas Anda sudah selesai, ya. Terima kasih telah
                            mengakses SINAFIS!
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary block w-100">Log Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>





    <script>
        $(document).ready(function () {
        $('#example').DataTable();
        });
    </script>

    @stack('js')

</body>

</html>