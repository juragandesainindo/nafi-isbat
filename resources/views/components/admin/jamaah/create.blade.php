@extends('layouts.master')

@section('title','Tambah Jamaah')

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
                    <a href="{{ route('jamaah.index') }}" class="btn btn-outline-secondary btn-sm"><i
                            class="bi bi-backspace"></i> Kembali</a>
                </div>
                <form action="{{ route('jamaah.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <h6>Nama</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="nama_jamaah" class="form-control @error('nama_jamaah') is-invalid
                            @enderror" value="{{ old('nama_jamaah') }}" placeholder="nama" required autofocus>

                                    @error('nama_jamaah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <h6>Alamat</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="alamat_jamaah" class="form-control @error('alamat_jamaah') is-invalid
                                                    @enderror" value="{{ old('alamat_jamaah') }}" placeholder="alamat">

                                    @error('alamat_jamaah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <h6>HP</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" name="hp_jamaah" class="form-control @error('hp_jamaah') is-invalid
                            @enderror" value="{{ old('hp_jamaah') }}" placeholder="hp" required>

                                    @error('hp_jamaah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <h6>Jenis Kelamin</h6>
                                </div>
                                <div class="col-lg-9">

                                    <input type="radio" name="jk" value="L" id="laki_laki" checked>
                                    <label for="laki_laki">Laki-Laki</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="jk" value="P" id="perempuan">
                                    <label for="perempuan">Perempuan</label>

                                    @error('jk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <h6>NIK KTP/SIM</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" name="nik" class="form-control @error('nik') is-invalid
                                                    @enderror" value="{{ old('nik') }}" placeholder="nik ktp/sim">

                                    @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mt-4 mb-3">
                                    <h6>Pemimpin</h6>
                                    <div class="form-group">
                                        <select class=" form-select" name="user_id" id="pemimpin" required>
                                            <option value="">-- Pilih pemimpin --</option>
                                            @foreach ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }} {{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-4 mb-3">
                                    <h6>Wilayah</h6>
                                    <div class="form-group">
                                        <select class="form-select" name="wilayah_id" id="wilayah" required></select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mt-4 mb-3">
                                    <h6>Foto Diri</h6>
                                    <div class="form-group">
                                        <input type="file" class="form-control @error('foto') is-invalid
                                        @enderror" name="foto" value="{{ old('foto') }}">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-4 mb-3">
                                    <h6>KTP</h6>
                                    <div class="form-group">
                                        <input type="file" class="form-control @error('ktp') is-invalid
                                        @enderror" name="ktp" value="{{ old('ktp') }}">
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#pemimpin').on('change',function(){
            var userId = this.value;
            $('#wilayah').html('');
            $.ajax({
                url:'{{ route('getWilayah') }}?user_id='+userId,
                type: 'get',
                success: function (res){
                    $('#wilayah').html('<option value="">-- Pilih wilayah --</option>');
                    $.each(res, function (key, value){
                        $('#wilayah').append('<option value="'+value.id+'">'+value.nama_wilayah+'</option>');
                    });
                }
            });
        });
    });
</script>
@endpush