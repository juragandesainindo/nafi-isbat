@extends('layouts.master')

@section('title','Edit Tender Nafi Isbat')

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
                <form
                    action="{{ route('tender-nafi-isbat.tenderUpdate',['id'=>$nafiIsbat->id, 'jamaah_id'=>$nafiIsbat->jamaah->slug]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mt-4 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <h6>Jamaah</h6>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" value="{{ $nafiIsbat->jamaah->nama_jamaah
                                            }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <h6>Paket</h6>
                                </div>
                                <div class="col-9">
                                    <select class="choices form-select" name="paket_nafi_isbat_id">
                                        <option value="{{ $nafiIsbat->paketNafiIsbat->id }}">{{
                                            number_format($nafiIsbat->paketNafiIsbat->paket) }}</option>
                                        @foreach ($paket as $item)
                                        <option value="{{ $item->id }}">{{ number_format($item->paket) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Ubah</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

@endsection