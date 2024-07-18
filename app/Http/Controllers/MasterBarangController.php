<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang;

class MasterBarangController extends Controller
{
    public function index()
    {
        $barang = MasterBarang::all();
        return view('list-barang', compact('barang'));
    }

    public function create()
    {
        return view('create-barang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idBarang' => 'required|integer',
            'gBarang' => 'required|string|max:255',
            'nBarang' => 'required|string|max:255',
            'qtyBarang' => 'required|integer',
            'hrgBarang' => 'required|numeric',
        ]);

        MasterBarang::create([
            'idBarang' => $request->idBarang,
            'gBarang' => $request->gBarang,
            'nBarang' => $request->nBarang,
            'qtyBarang' => $request->qtyBarang,
            'hrgBarang' => $request->hrgBarang,
        ]);

        return redirect('/create-barang')->with('success', 'Barang created successfully!');
    }

    public function edit($id)
    {
        $barang = MasterBarang::findOrFail($id);
        return view('edit-barang', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idBarang' => 'required|integer',
            'gBarang' => 'required|string|max:255',
            'nBarang' => 'required|string|max:255',
            'qtyBarang' => 'required|integer',
            'hrgBarang' => 'required|numeric',
        ]);

        $barang = MasterBarang::findOrFail($id);
        $barang->update($request->all());

        return redirect('/list-barang')->with('success', 'Barang updated successfully!');
    }

    public function destroy($id)
    {
        $barang = MasterBarang::findOrFail($id);
        $barang->delete();

        return redirect('/list-barang')->with('success', 'Barang deleted successfully!');
    }
}
