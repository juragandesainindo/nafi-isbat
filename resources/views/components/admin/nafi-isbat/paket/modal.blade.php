<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('paket-nafi-isbat.paketStore') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Paket Nafi Isbat</label>
                        <input type="text" class="form-control" name="paket" value="{{ old('paket') }}" id="uang"
                            placeholder="Rp. " autofocus required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ===================== EDIT ===================== -->
@foreach ($paket as $item)
<div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('paket-nafi-isbat.paketUpdate',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label>Paket Nafi Isbat</label>
                        <input type="text" class="form-control" name="paket" value="{{ old('paket') ?? $item->paket }}"
                            id="rupiah" placeholder="Rp. " autofocus required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


<!-- ===================== HAPUS ===================== -->
@foreach ($paket as $item)
<div class="modal fade" id="delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin hapus paket?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('paket-nafi-isbat.paketUpdate',$item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">

                    Apakah yakin ingin menghapus paket <strong>{{ number_format($item->paket) }}</strong> ini?

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