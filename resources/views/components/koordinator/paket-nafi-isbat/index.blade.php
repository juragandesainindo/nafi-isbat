@extends('layouts.base')

@section('title','Paket Nafi Isbat')

@section('nav-top')
<span class="nav-title">
    {{-- <a href="{{ route('jamaah.index') }}">
        <i class="bi bi-arrow-left"></i>&nbsp;
    </a> --}}
    @yield('title')
</span>
@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <a href="{{ route('paket.create') }}" class="btn btn-sm btn-add">
                <i class="bi bi-plus-circle"></i>&nbsp;
                <span>Tambah Paket</span>
            </a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped text-sm mt-5" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket</th>
                        <th>Dibuat/Diubah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paket as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            {{ number_format($item->paket) }} <br>
                        </td>
                        <td style="font-size: 11px;">
                            {{ $item->created_at }} / <br>
                            {{ $item->updated_at }} <br>
                        </td>
                        <td>
                            <a href="{{ route('paket.edit',['id'=>$item->id,'paket'=>$item->paket]) }}"
                                class="btn btn-edit btn-sm mb-1">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection