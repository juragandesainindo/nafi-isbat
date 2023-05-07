@extends('layouts.base')

@section('title','Wilayah')

@section('nav-top')
<span class="nav-title">
    <a href="{{ route('jamaah.index') }}">
        <i class="bi bi-arrow-left"></i>&nbsp; @yield('title') {{ $wilayah->nama_wilayah }}
    </a>
</span>
@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <a href="{{ route('jamaah.createPemimpin',['id'=>$wilayah->id,'slug'=>$wilayah->slug]) }}"
                class="btn btn-sm btn-add">
                <i class="bi bi-plus-circle"></i>&nbsp;
                <span>Tambah Jamaah</span>
            </a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped text-sm mt-5" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jamaah as $key => $item)
                    <tr>
                        <td>
                            @if ($item->foto != Null)

                            <img src="{{ asset('assets/images/jamaah/foto/'.$item->foto) }}" width="50" height="50"
                                style="border-radius: 50%;object-fit: cover;">
                            @endif
                        </td>
                        <td>
                            {{ $item->nama_jamaah }} <br>
                            <span class="text-sm">{{ $item->hp_jamaah }}</span>
                        </td>
                        <td>{{ $item->jk }}</td>
                        <td>
                            <a href="{{ route('jamaah.edit',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                                class="btn btn-edit btn-sm mb-1">
                                {{-- <i class="bi bi-pencil"></i> &nbsp; --}}
                                Edit
                            </a>
                            <a href="{{ route('jamaah.detail',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                                class="btn btn-edit btn-sm mb-1">
                                {{-- <i class="bi bi-eye"></i> &nbsp; --}}
                                Detail
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