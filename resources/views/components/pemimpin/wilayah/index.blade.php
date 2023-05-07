@extends('layouts.base')

@section('title','Wilayah Pertawajuhan')

@section('nav-top')
<span class="nav-title">@yield('title')</span>
@endsection

@section('content')
<section class="content">




    <div class="card">
        <div class="card-header">
            <a href="{{ route('wilayah.create') }}" class="btn btn-add btn-sm">
                <i class="bi bi-plus-circle"></i>&nbsp;
                <span>Tambah Wilayah</span>
            </a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Wilayah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $key=> $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->nama_wilayah }}</td>
                        <td>

                            <a href="{{ route('wilayah.edit',['id'=>$item->id, 'slug'=>$item->slug]) }}"
                                class="btn btn-edit btn-sm mb-1">
                                <i class="bi bi-pencil"></i> &nbsp; Edit
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