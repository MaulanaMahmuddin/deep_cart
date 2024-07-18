<!-- resources/views/list-viewKeranjang.blade.php -->

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
                <th>No</th>
                <th>Nama Keranjang</th>
                <th>Gambar Barang</th>
                <th>Nama Barang</th>
                <th>QTY</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewKeranjang as $item)
                <tr>
                    <td>{{ $item->idVKeranjang }}</td>
                    <td>{{ $item->namaKeranjang }}</td>
                    <td>{{ $item->gBarang }}</td>
                    <td>{{ $item->nBarang }}</td>
                    <td>{{ $item->qtyVKeranjang }}</td>
                    <td>{{ $item->hrgBarang * $item->qtyVKeranjang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
