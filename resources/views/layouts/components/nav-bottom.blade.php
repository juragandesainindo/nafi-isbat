@if (Auth::user()->role == 'Pemimpin')
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
@elseif (Auth::user()->role == 'Koordinator')
<nav class="navbar navbar-light navbar-expand fixed-bottom py-0 nav-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i>
                <span class="d-block">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('koordinator/paket-nafi-isbat') }}"
                class="nav-link {{ request()->is('koordinator/paket-nafi-isbat*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt-fill"></i>
                <span class="d-block">Paket</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('koordinator/tender-nafi-isbat') }}"
                class="nav-link {{ request()->is('koordinator/tender-nafi-isbat*') ? 'active' : '' }}">
                <i class="bi bi-person-fill"></i>
                <span class="d-block">Nafi Isbat</span>
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
@else

@endif

<!-- Modal -->
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
                    Pastikan semua aktivitas Anda sudah selesai, ya. Terima kasih telah mengakses SINAFIS!
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary block w-100">Log Out</button>
                </div>
            </form>
        </div>
    </div>
</div>