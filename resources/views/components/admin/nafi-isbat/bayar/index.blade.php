@extends('layouts.master')

@section('title','Bayar Nafi Isbat')

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
            <!-- ====================== BAYAR ====================== -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('tender-nafi-isbat.tenderIndex') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-backspace"></i>
                        Kembali
                    </a>
                    <span class="badge bg-primary">{{ $nafiIsbat->jamaah->nama_jamaah }}</span>
                </div>
                <form action="{{ route('bayar-nafi-isbat.bayarStore') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="nafi_isbat_id" value="{{ $nafiIsbat->id }}">
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <label for="">Bayar</label>
                                </div>
                                <div class="col-9">
                                    @if ($sisa <= 0) <input type="text" class="form-control" placeholder="Lunas"
                                        disabled>
                                        @else
                                        <input type="text" name="bayar" id="currency-field" data-type="currency"
                                            class="form-control" placeholder="Rp. " required autofocus>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- ====================== TABLE DETAIL ====================== -->
            <div class="card">
                <div class="card-header text-sm">
                    <div class="w-25 d-flex justify-content-between align-items-center mb-3">
                        <span>Keterangan</span>
                        @if ($sisa <= 0) <span class="badge bg-success">Lunas</span>

                            @else
                            <span class="badge bg-danger">Cicil</span>

                            @endif
                    </div>
                    <div class="w-25 d-flex justify-content-between align-items-center mb-1">
                        <span>Tender</span>
                        <span>{{ number_format($nafiIsbat->paketNafiIsbat->paket) }}</span>
                    </div>
                    <div class="w-25 d-flex justify-content-between align-items-center mb-1">
                        <span>Total Bayar</span>
                        <span>{{ number_format($totalBayar) }}</span>
                    </div>
                    <div class="w-25 d-flex justify-content-between align-items-center mb-1">
                        <span>Sisa Tender</span>
                        <span class="text-primary fw-bold">{{ number_format($sisa) }}</span>
                    </div>

                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bayar</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($bayarIsbat as $item)
                            <tr class="text-sm">
                                <td>{{ $no++ }}</td>
                                <td>
                                    <form action="{{ route('bayar-nafi-isbat.bayarUpdate',$item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <input type="text" name="bayar"
                                                value="{{ old('bayar') ?? number_format($item->bayar) }}"
                                                class="form-control" id="currency-field" data-type="currency"
                                                value="{{ number_format($item->bayar) }}">
                                            <button type="submit" class="btn btn-primary btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <span class="fst-italic text-success" style="font-size: 12px;">
                                        <i class="bi bi-clock"></i>
                                        {{ $item->created_at->format('d-m-Y H:i:s') }}
                                    </span><br>
                                    <span class="fst-italic text-info" style="font-size: 12px;">
                                        <i class="bi bi-clock-history"></i>
                                        {{ $item->updated_at->format('d-m-Y H:i:s') }}
                                    </span>
                                </td>
                                <td>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete-{{ $item->id }}" title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
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


@foreach ($bayarIsbat as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Angsuran Nafi Isbat?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bayar-nafi-isbat.bayarDestroy',$item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">

                    Apakah yakin ingin menghapus angsuran nafi isbat <strong>{{ $item->nafiIsbat->jamaah->nama_jamaah
                        }}</strong> senilai <strong>Rp. {{ number_format($item->bayar) }}</strong>
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

@push('js')
<script>
    // Jquery Dependency
    // referensi https://codepen.io/559wade/pen/LRzEjj
    
    $("input[data-type='currency']").on({
    keyup: function() {
    formatCurrency($(this));
    },
    blur: function() {
    formatCurrency($(this), "blur");
    }
    });
    
    
    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }
    
    
    function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;
    
    // initial caret position
    var caret_pos = input.prop("selectionStart");
    
    // check for decimal
    if (input_val.indexOf(".") >= 0) {
    
    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");
    
    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);
    
    // add commas to left side of number
    left_side = formatNumber(left_side);
    
    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
    right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);
    
    // join number by .
    // input_val = "Rp " + left_side + "." + right_side;
    
    } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    // input_val = "Rp " + input_val;
    
    // final formatting
    // if (blur === "blur") {
    // input_val += ".00";
    // }
    }
    
    // send updated string to input
    input.val(input_val);
    
    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
@endpush