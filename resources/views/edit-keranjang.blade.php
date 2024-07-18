<!-- resources/views/edit-keranjang.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Master Keranjang</title>
</head>
<body>
    <h1>Edit Master Keranjang</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form action="/update-keranjang/{{ $keranjang->idKeranjang }}" method="POST">
        @csrf
        <label for="namaKeranjang">Nama Keranjang:</label>
        <input type="text" id="namaKeranjang" name="namaKeranjang" value="{{ $keranjang->namaKeranjang }}" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
