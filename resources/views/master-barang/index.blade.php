@extends('layouts.app')
@section('title', 'Master Barang')
@section('content')
    <style>
        .row-select {
            display: none;
        }
    </style>
    <div class="row g-5 g-xl-8">
        <div class="col-12">
            <button id="addBbutton" class="btn btn-primary" onclick="showModalGeneral('/create-barang')">Tambah</a>

        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 bg-white rounded-3">
            <table id="datatable" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
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
                            <td>
                                @if ($item->gBarang)
                                    <a href="{{ asset('storage/' . $item->gBarang) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $item->gBarang) }}" alt="Image"
                                            style="width: 100px; height: auto;">
                                    </a>
                                @else
                                    No image available
                                @endif
                            </td>
                            <td>{{ $item->nBarang }}</td>
                            <td>{{ $item->qtyBarang }}</td>
                            <td>{{ $item->hrgBarang }}</td>
                            <td>
                                <button onclick="showModalGeneral('/edit-barang/{{ $item->idBarang }}')"
                                    class="btn btn-icon btn-success btn-sm">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>' . $title . '</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                    height="2" rx="1" />
                                            </g>
                                        </svg></span></button>
                                <button onclick="alertConfirm('/delete-barang/{{ $item->idBarang }}', 'delete')"
                                    class="btn btn-icon btn-danger btn-sm">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>' . $title . '</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg></span>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Row-->
@endsection
@push('js')
@endpush
