@extends('layouts.master')

@section('title','Tambah Tender Nafi Isbat')

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
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('tender-nafi-isbat.tenderIndex') }}" class="btn btn-outline-secondary btn-sm"><i
                            class="bi bi-backspace"></i> Kembali</a>
                </div>
                <form action="{{ route('tender-nafi-isbat.tenderStore') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mt-4 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <h6>Jamaah</h6>
                                </div>
                                <div class="col-9">
                                    <select class="choices form-select @error('jamaah_id') is-invalid
                                    @enderror" name="jamaah_id" required>
                                        <option value="">-- Pilih jamaah --</option>
                                        @foreach ($jamaah as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_jamaah }} | ({{ $item->user->title }} {{ $item->user->name }}
                                            - {{ $item->wilayah->nama_wilayah }})
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('jamaah_id')
                                    <span class="text-danger">Tender jamaah sudah ada</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <h6>Paket</h6>
                                </div>
                                <div class="col-9">
                                    <select class="choices form-select" name="paket_nafi_isbat_id" required>
                                        <option value="">-- Pilih paket --</option>
                                        @foreach ($paket as $item)
                                        <option value="{{ $item->id }}">{{ number_format($item->paket) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

@endsection