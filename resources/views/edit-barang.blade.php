<!-- resources/views/edit-baranfg.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Master Barang</title>
</head>
<body>
    <h1>Edit Master Barang</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form action="/update-barang/{{ $barang->idBarang }}" method="POST">
        @csrf
        <label for="gBarang">Gambar Barang:</label>
        <input type="text" id="gBarang" name="gBarang" value="{{ $barang->gBarang }}" required>
        <label for="nBarang">Nama Barang:</label>
        <input type="text" id="nBarang" name="nBarang" value="{{ $barang->nBarang }}" required>
        <label for="qtyBarang">Qty Barang:</label>
        <input type="number" id="qtyBarang" name="qtyBarang" value="{{ $barang->qtyBarang }}" required>
        <label for="hrgBarang">Harga Barang:</label>
        <input type="number" step="0.01" id="hrgBarang" name="hrgBarang" value="{{ $barang->hrgBarang }}" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
