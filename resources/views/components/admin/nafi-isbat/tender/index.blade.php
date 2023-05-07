@extends('layouts.master')

@section('title','Nafi Isbat')

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
                <div class="col-12 col-md-12">
                    <h3>@yield('title')</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('tender-nafi-isbat.tenderCreate') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-plus-circle"></i>
                        Tambah @yield('title')
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pemimpin</th>
                                <th>Nafi Isbat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tender as $key => $item)
                            <tr class="text-sm">
                                <td>{{ ++$key }}</td>
                                <td>
                                    <strong>{{ $item->jamaah->nama_jamaah }}</strong>

                                </td>
                                <td>
                                    <span>{{ $item->jamaah->user->title }} {{
                                        $item->jamaah->user->name }}</span> <br>
                                    <span class="badge bg-danger">{{ $item->jamaah->wilayah->nama_wilayah }}</span>
                                </td>
                                <td>Rp. {{ number_format($item->paketNafiIsbat->paket) }}</td>
                                <td>
                                    <a href="{{ route('tender-nafi-isbat.tenderEdit',['id'=>$item->id, 'jamaah_id'=>$item->jamaah->slug]) }}"
                                        class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $item->id }}" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    <a href="{{ route('bayar-nafi-isbat.bayarTender',['id'=>$item->id, 'jamaah_id'=>$item->jamaah->slug]) }}"
                                        class="btn btn-success btn-sm" title="Bayar"><i class="bi bi-cash-coin"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>


@foreach ($tender as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Tender Nafi Isbat?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tender-nafi-isbat.tenderDestroy',$item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">

                    Apakah yakin ingin menghapus tender nafi isbat <strong>{{ $item->jamaah->nama_jamaah }}</strong>
                    ini?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection