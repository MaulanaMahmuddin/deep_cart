<!-- resources/views/create-baranfg.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Master Barang</title>
</head>
<body>
    <h1>Create Master Barang</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form action="/create-barang" method="POST">
        @csrf
        <label for="idBarang">ID:</label>
        <input type="text" id="idBarang" name="idBarang" required>
        <label for="gBarang">Gambar Barang:</label>
        <input type="text" id="gBarang" name="gBarang" required>
        <label for="nBarang">Nama Barang:</label>
        <input type="text" id="nBarang" name="nBarang" required>
        <label for="qtyBarang">Qty Barang:</label>
        <input type="number" id="qtyBarang" name="qtyBarang" required>
        <label for="hrgBarang">Harga Barang:</label>
        <input type="number" step="0.01" id="hrgBarang" name="hrgBarang" required>
        <button type="submit">Create</button>
    </form>
</body>
</html>
