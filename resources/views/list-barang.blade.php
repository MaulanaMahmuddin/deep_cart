<!-- resources/views/list-baranfg.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Master Barang</title>
</head>
<body>
    <h1>List Master Barang</h1>
    
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <table border="1">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Gambar Barang</th>
                <th>Nama Barang</th>
                <th>Qty Barang</th>
                <th>Harga Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $item->idBarang }}</td>
                    <td>{{ $item->gBarang }}</td>
                    <td>{{ $item->nBarang }}</td>
                    <td>{{ $item->qtyBarang }}</td>
                    <td>{{ $item->hrgBarang }}</td>
                    <td>
                        <a href="/edit-barang/{{ $item->idBarang }}">Edit</a>
                        <a href="/delete-barang/{{ $item->idBarang }}" onclick="return confirm('Are you sure?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
