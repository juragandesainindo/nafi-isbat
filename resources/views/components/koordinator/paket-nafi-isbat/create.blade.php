@extends('layouts.base')

@section('title','Tambah Paket')

@section('nav-top')
<span class="nav-title">
    <a href="{{ route('paket.index') }}">
        <i class="bi bi-arrow-left"></i>&nbsp; @yield('title')
    </a>
</span>
@endsection

@section('content')
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paket.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="form-group mb-3">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <label>Paket</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="paket" value="{{ old('paket') }}" class="form-control @error('paket') is-invalid
                                                                @enderror" placeholder="Rp. " id="currency-field"
                                    data-type="currency" required autofocus>

                                @error('paket')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type=" submit" class="btn btn-submit w-100 mt-4">
                        Simpan</button>
            </form>
        </div>
    </div>
</section>
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