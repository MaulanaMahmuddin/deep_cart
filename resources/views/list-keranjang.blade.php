<!-- resources/views/list-keranjang.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Master Keranjang</title>
</head>
<body>
    <h1>List Master Keranjang</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <table border="1">
        <thead>
            <tr>
                <th>ID Keranjang</th>
                <th>Nama Keranjang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keranjang as $item)
                <tr>
                    <td>{{ $item->idKeranjang }}</td>
                    <td>{{ $item->namaKeranjang }}</td>
                    <td>
                        <a href="/edit-keranjang/{{ $item->idKeranjang }}">Edit</a>
                        <a href="/delete-keranjang/{{ $item->idKeranjang }}" onclick="return confirm('Are you sure?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
