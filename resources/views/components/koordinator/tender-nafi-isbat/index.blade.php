@extends('layouts.base')

@section('title','Nafi Isbat')

@section('nav-top')
<span class="nav-title">
    @yield('title')
</span>
@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped text-sm mt-5" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Bayar</th>
                        <th>ket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($nafiIsbat as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            {{ $item->jamaah->nama_jamaah }} <br>
                            <span class="badge bg-warning">{{ $item->jamaah->wilayah->nama_wilayah }}</span> <br>
                            <span class="badge bg-info">{{ $item->jamaah->user->title }} {{ $item->jamaah->user->name
                                }}</span>

                        </td>
                        <td>
                            {{ number_format($item->paketNafiIsbat->paket) }}
                        </td>
                        <td>
                            {{ number_format($item->bayarNafiIsbat->sum('bayar')) }}
                        </td>
                        <td>
                            @if ($item->paketNafiIsbat->paket-$item->bayarNafiIsbat->sum('bayar') <= 0) <span
                                class="badge bg-success">Lunas</span>
                                @else
                                <span class="badge bg-danger">Cicil</span>
                                @endif
                        </td>
                        <td>
                            <a href="{{ route('tender.show',['id'=>$item->id,'jamaahId'=>$item->jamaah->slug]) }}"
                                class="btn btn-edit btn-sm mb-1">
                                Bayar
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