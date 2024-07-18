<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewKeranjang;
use App\Models\MasterBarang;
use App\Models\MasterKeranjang;

class ViewKeranjangController extends Controller
{

    public function index()
    {
        // $viewKeranjang = ViewKeranjang::all();
        // return view('list-viewKeranjang', compact('viewKeranjang'));


        $viewKeranjang = ViewKeranjang::with(['keranjang', 'barang'])
            ->join('masterKeranjang', 'viewKeranjang.idKeranjang', '=', 'masterKeranjang.idKeranjang')
            ->join('masterBarang', 'viewKeranjang.idBarang', '=', 'masterBarang.idBarang')
            ->select(
                'viewKeranjang.*',
                'masterKeranjang.namaKeranjang',
                'masterBarang.gBarang',
                'masterBarang.nBarang',
                'masterBarang.hrgBarang'
            )
            ->get();

        return view('dashboard.list-viewKeranjang', compact('viewKeranjang'));
    }
}
