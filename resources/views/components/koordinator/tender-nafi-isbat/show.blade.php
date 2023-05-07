@extends('layouts.base')

@section('title','Bayar Nafi Isbat')

@section('nav-top')
<span class="nav-title">
    <a href="{{ route('tender.index') }}">
        <i class="bi bi-arrow-left"></i>&nbsp; @yield('title')
    </a>
</span>
@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center w-50 mb-2">
                <span>Keterangan</span>
                @if ($sisa <= 0) <span class="badge bg-success">Lunas</span>
                    @else
                    <span class="badge bg-danger">Cicil</span>
                    @endif
            </div>
            <div class="d-flex justify-content-between align-items-center w-50">
                <span>Tender</span>
                <span>{{ number_format($nafiIsbat->paketNafiIsbat->paket) }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center w-50">
                <span>Total Bayar</span>
                <span>{{ number_format($totalBayar) }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center w-50">
                <span>Sisa</span>
                <span class="fw-bold">{{ number_format($sisa) }}</span>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('tender.store') }}" method="post">
                @csrf
                <div class="row mb-4">
                    <label for="">Bayar Nafi Isbat</label>
                    <div class="col-7">
                        <input type="text" name="bayar" class="form-control" id="currency-field" data-type="currency">
                        <input type="hidden" name="nafi_isbat_id" value="{{ $nafiIsbat->id }}">
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-edit w-100">Simpan</button>
                    </div>
                </div>
            </form>

            <table class="table mt-5" style="width:100%">
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
                    <tr>
                        <td>{{ $no++ }}</td>
                        <form action="{{ route('tender.update',$item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="text" name="bayar" class="form-control"
                                    value="{{ number_format($item->bayar) }}" id="currency-field" data-type="currency">
                            </td>
                            <td style="font-size: 11px;">
                                {{ $item->created_at }} <br>
                                {{ $item->updated_at }}
                            </td>
                            <td>
                                <button type="submit" class="btn btn-edit btn-sm mb-1">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#delete-{{ $item->id }}">
                                    Hapus
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>


@foreach ($bayarIsbat as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Angsuran Nafi Isbat?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tender.destroy',$item->id) }}" method="post">
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