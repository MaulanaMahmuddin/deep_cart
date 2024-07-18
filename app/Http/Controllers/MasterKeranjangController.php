<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKeranjang;

class MasterKeranjangController extends Controller
{
    public function index()
    {
        $keranjang = MasterKeranjang::all();
        return view('list-keranjang', compact('keranjang'));
    }

    public function create()
    {
        return view('create-keranjang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKeranjang' => 'required|string|max:255',
        ]);

        MasterKeranjang::create([
            'namaKeranjang' => $request->namaKeranjang,
        ]);

        return redirect('/create-keranjang')->with('success', 'Keranjang created successfully!');
    }

    public function edit($id)
    {
        $keranjang = MasterKeranjang::findOrFail($id);
        return view('edit-keranjang', compact('keranjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKeranjang' => 'required|string|max:255',
        ]);

        $keranjang = MasterKeranjang::findOrFail($id);
        $keranjang->update($request->all());

        return redirect('/list-keranjang')->with('success', 'Keranjang updated successfully!');
    }

    public function destroy($id)
    {
        $keranjang = MasterKeranjang::findOrFail($id);
        $keranjang->delete();

        return redirect('/list-keranjang')->with('success', 'Keranjang deleted successfully!');
    }
}
