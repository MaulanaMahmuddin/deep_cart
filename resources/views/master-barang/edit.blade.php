<form action="/update-barang/{{ $barang->idBarang }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card card-flush p-0">
        <div class="card-header p-0">
            <div class="card-title p-0">
                <h2>Edit Barang</h2>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Gambar Barang</label>
                        <input type="file" name="gBarang" id="gBarang" class="form-control mb-2"
                            placeholder="Gambar Barang" value="{{ $barang->gBarang }}" />
                        @if ($barang->gBarang)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $barang->gBarang) }}" alt="Image"
                                style="width: 100px; height: auto;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Nama Barang</label>
                        <input type="text" name="nBarang" id="nBarang" class="form-control mb-2"
                            placeholder="Nama Barang" value="{{ $barang->nBarang }}" required />
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Qty Barang</label>
                        <input type="number" name="qtyBarang" id="qtyBarang" class="form-control mb-2"
                            placeholder="Qty Barang" value="{{ $barang->qtyBarang }}" required />
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Harga Barang</label>
                        <input type="number" name="hrgBarang" id="hrgBarang" class="form-control mb-2"
                            placeholder="Harga Barang" value="{{ $barang->hrgBarang }}" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Update</button>
</form>
