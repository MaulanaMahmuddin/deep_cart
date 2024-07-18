<form action="/create-barang" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card card-flush p-0">
        <div class="card-header p-0">
            <div class="card-title p-0">
                <h2>Tambah Barang</h2>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">ID Barang</label>
                        <input type="text" name="idBarang" id="idBarang" class="form-control mb-2"
                            placeholder="ID Barang" required />
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Gambar Barang</label>
                        <input type="file" name="gBarang" id="gBarang" class="form-control mb-2"
                            placeholder="Gambar Barang" required />
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Nama Barang</label>
                        <input type="text" name="nBarang" id="nBarang" class="form-control mb-2"
                            placeholder="Nama Barang" required />
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Qty Barang</label>
                        <input type="number" name="qtyBarang" id="qtyBarang" class="form-control mb-2"
                            placeholder="Qty Barang" required />
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row">
                <div class="d-flex flex-wrap gap-5">
                    <div class="fv-row w-100 flex-md-root">
                        <label class="required form-label">Harga Barang</label>
                        <input type="number" name="hrgBarang" id="hrgBarang" class="form-control mb-2"
                            placeholder="Harga Barang" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Update</button>
</form>
