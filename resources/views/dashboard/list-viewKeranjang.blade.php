@extends('layouts.app')
@section('title', 'Keranjang')
@section('content')
<style>
    .row-select {
        display: none;
    }
</style>
<div class="row g-5 g-xl-8">
    <div class="col-12">
        <p class="h1">List Belanjaan Kamu Hari Ini</p>
        <p class="">Terdapat {{ sizeOf($viewKeranjang) }} item yang kamu pilih untuk di beli</p>
    </div>
    <div class="col-12">
        <form method="GET" action="{{ route('viewKeranjang.index') }}">
            <div class="form-group">
                <label for="idKeranjang">Pilih Keranjang:</label>
                <select id="idKeranjang" name="idKeranjang" class="form-control">
                    @foreach($allKeranjang as $keranjang)
                        <option value="{{ $keranjang->idKeranjang }}" {{ request('idKeranjang') == $keranjang->idKeranjang ? 'selected' : '' }}>
                            {{ $keranjang->namaKeranjang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <div class="col-8">
        <div class="row">
            @php
                $total = 0;
            @endphp
            @foreach ($viewKeranjang as $item)
                @php
                    $subtotal = $item->hrgBarang * $item->qtyVKeranjang;
                    $total += $subtotal;
                @endphp
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <div class="col-md-3 align-items-center">
                                @if ($item->gBarang)
                                    <img src="{{ Storage::url($item->gBarang) }}" width="50%" class="m-5" alt="Image" />
                                @else
                                    <img src="https://via.placeholder.com/300" class="card-img" alt="No image available" style="height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nBarang }}</h5>
                                    <p class="card-text">{{ $item->qtyVKeranjang }}x</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-body">
                                    <p class="card-text fw-bold fs-1">Rp. {{ number_format($subtotal) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Information</h5>
                <p class="card-text">
                <div class="card">
                    <p>Aplikasi ini dibuat dengan ide yang di cantumkan dalam skripsi dengan menggunakan algoritma faster R-CNN</p>
                </div>
                <h5>Ringkasan Harga</h5>
                <hr />
                <div class="d-flex justify-content-between fs-2">
                    <p>Total</p>
                    <p class="fw-bold">Rp. {{ number_format($total) }}</p>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    // Refresh the page every 30 seconds
    setInterval(function() {
        window.location.reload();
    }, 5000); // 30000 milliseconds = 30 seconds
</script>
<!--end::Row-->
@endsection
@push('js')
@endpush
