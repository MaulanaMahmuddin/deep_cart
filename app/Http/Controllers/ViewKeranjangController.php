<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewKeranjang;
use App\Models\MasterBarang;
use App\Models\MasterKeranjang;

class ViewKeranjangController extends Controller
{

    // public function index()
    // {
    //     $viewKeranjang = ViewKeranjang::with(['keranjang', 'barang'])
    //         ->join('masterKeranjang', 'viewKeranjang.idKeranjang', '=', 'masterKeranjang.idKeranjang')
    //         ->join('masterBarang', 'viewKeranjang.idBarang', '=', 'masterBarang.idBarang')
    //         ->select(
    //             'viewKeranjang.*',
    //             'masterKeranjang.namaKeranjang',
    //             'masterBarang.gBarang',
    //             'masterBarang.nBarang',
    //             'masterBarang.hrgBarang'
    //         )
    //         ->get();
    
    //     return view('dashboard.list-viewKeranjang', compact('viewKeranjang'));
    // }

    public function index(Request $request)
    {
        $idKeranjang = $request->get('idKeranjang');
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
            ->when($idKeranjang, function($query) use ($idKeranjang) {
                return $query->where('viewKeranjang.idKeranjang', $idKeranjang);
            })
            ->get();
        
        $allKeranjang = MasterKeranjang::all();
    
        return view('dashboard.list-viewKeranjang', compact('viewKeranjang', 'allKeranjang'));
    }
}
