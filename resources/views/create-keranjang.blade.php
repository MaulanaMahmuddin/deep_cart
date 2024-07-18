<!-- resources/views/create-keranjang.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Master Keranjang</title>
</head>
<body>
    <h1>Create Master Keranjang</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form action="/create-keranjang" method="POST">
        @csrf
        <label for="namaKeranjang">Nama Keranjang:</label>
        <input type="text" id="namaKeranjang" name="namaKeranjang" required>
        <button type="submit">Create</button>
    </form>
</body>
</html>
