@extends('layouts.master')

@section('title','Jamaah')

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
                    <a href="{{ route('jamaah.create') }}" class="btn btn-outline-primary btn-sm"><i
                            class="bi bi-plus-circle"></i>
                        Tambah @yield('title')</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Pemimpin</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jamaah as $key => $item)
                            <tr class="text-sm">
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{ $item->nama_jamaah }} <br>
                                    <span class="text-sm text-secondary">{{ $item->hp_jamaah }}</span>
                                </td>
                                <td>{{ $item->alamat_jamaah }}</td>
                                <td>
                                    {{ $item->user->title }} {{ $item->user->name }} <br>
                                    <span class="badge bg-danger">{{ $item->wilayah->nama_wilayah }}</span>
                                </td>
                                <td>
                                    @if ($item->foto == NULL)
                                    @else
                                    <img src="{{ asset('assets/images/jamaah/foto/'.$item->foto) }}" width="50"
                                        height="50" class="rounded-circle">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('jamaah.edit',['id'=>$item->id,'slug'=>$item->slug]) }}"
                                        class="btn btn-primary btn-sm" title="Edit user"><i
                                            class="bi bi-pencil"></i></a>
                                    <a href="{{ route('jamaah.show',['id'=>$item->id,'slug'=>$item->slug]) }}"
                                        class="btn btn-info btn-sm" title="Detail user"><i class="bi bi-eye"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $item->id }}" title="Hapus user">
                                        <i class="bi bi-trash"></i>
                                    </button>
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


@foreach ($jamaah as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Jamaah?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jamaah.destroy',['id'=>$item->id, 'slug'=>$item->slug]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah yakin ingin menghapus jamaah <strong>{{ $item->nama_jamaah }}</strong> ini?
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