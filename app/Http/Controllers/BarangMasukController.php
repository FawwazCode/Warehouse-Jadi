<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;

class BarangMasukController extends Controller
{

    public function index()
    {
        $data = BarangMasuk::with('barang','supplier')->get();
        return view('petugas.barang-masuk.index', compact('data'));
    }

    public function create(Request $request)
    {
        $barang = Barang::all();

        $supplier = [];

        if ($request->barang_id) {
            $barangSelected = Barang::find($request->barang_id);
            $supplier = $barangSelected->suppliers;
        }

        return view('petugas.barang-masuk.create', compact('barang','supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'tanggal' => 'required'
        ]);

        $barang = \App\Models\Barang::find($request->barang_id);

        $stok_sebelum = $barang->stok;
        $stok_sesudah = $stok_sebelum + $request->jumlah;

        \App\Models\BarangMasuk::create([
            'barang_id' => $request->barang_id,
            'supplier_id' => $request->supplier_id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'stok_sebelum' => $stok_sebelum,
            'stok_sesudah' => $stok_sesudah,
        ]);

        // UPDATE STOK
        $barang->stok = $stok_sesudah;
        $barang->save();

        return redirect('/barang-masuk')->with('success', 'Data berhasil ditambah');
    }

    public function show($id){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}
}