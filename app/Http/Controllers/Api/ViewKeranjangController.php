<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewKeranjang;

class ViewKeranjangController extends Controller
{
    public function index()
    {
        $viewKeranjang = ViewKeranjang::with(['keranjang', 'barang'])
            ->join('masterKeranjang', 'viewKeranjang.idKeranjang', '=', 'masterKeranjang.idKeranjang')
            ->join('masterBarang', 'viewKeranjang.idBarang', '=', 'masterBarang.idBarang')
            ->select(
                'viewKeranjang.idVKeranjang',
                'viewKeranjang.idKeranjang',
                'viewKeranjang.idBarang',
                'masterBarang.gBarang',
                'masterBarang.nBarang',
                'masterBarang.hrgBarang',
                'viewKeranjang.qtyVKeranjang'
            )
            ->get();
        
        return response()->json($viewKeranjang);
    }
}
