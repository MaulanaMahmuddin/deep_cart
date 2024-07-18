<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang;
use Illuminate\Support\Facades\Storage;

class MasterBarangController extends Controller
{
    public function index()
    {
        $barang = MasterBarang::all();
        return view('master-barang.index', compact('barang'));
    }

    public function create()
    {
        return view('master-barang.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'idBarang' => 'required|integer',
                'nBarang' => 'required|string|max:255',
                'qtyBarang' => 'required|integer',
                'hrgBarang' => 'required|numeric',
                'gBarang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            $imagePath = null;
            if ($request->hasFile('gBarang')) {
                $imagePath = $request->file('gBarang')->store('images', 'public');
            }

            MasterBarang::create([
                'idBarang' => $request->idBarang,
                'gBarang' => $imagePath,
                'nBarang' => $request->nBarang,
                'qtyBarang' => $request->qtyBarang,
                'hrgBarang' => $request->hrgBarang,
            ]);

            return redirect('/list-barang')->with('success', 'Barang created successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit($id)
    {
        $barang = MasterBarang::findOrFail($id);
        return view('master-barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gBarang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nBarang' => 'required|string|max:255',
            'qtyBarang' => 'required|integer',
            'hrgBarang' => 'required|numeric',
        ]);

        $barang = MasterBarang::findOrFail($id);

        if ($request->hasFile('gBarang')) {
            // Delete the old image if it exists
            if ($barang->gBarang) {
                Storage::delete('public/' . $barang->gBarang);
            }

            // Store the new image
            $imagePath = $request->file('gBarang')->store('images', 'public');
            $barang->gBarang = $imagePath;
        }

        $barang->update($request->only(['nBarang', 'qtyBarang', 'hrgBarang']));

        return redirect('/list-barang')->with('success', 'Barang updated successfully!');
    }

    public function destroy($id)
    {
        $barang = MasterBarang::findOrFail($id);
        $barang->delete();

        return redirect('/list-barang')->with('success', 'Barang deleted successfully!');
    }
}
