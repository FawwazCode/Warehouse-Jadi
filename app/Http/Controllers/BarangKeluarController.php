<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_keluar = BarangKeluar::with('barang')->get();
        return view('petugas.barang-keluar.index', compact('barang_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = \App\Models\Barang::all();
        return view('petugas.barang-keluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'barang_id' => 'required',
        'jumlah' => 'required|numeric|min:1',
        'tanggal' => 'required'
    ]);

    $barang = \App\Models\Barang::find($request->barang_id);

    // ❗ VALIDASI STOK
    if ($request->jumlah > $barang->stok) {
        return back()->withErrors(['jumlah' => 'Stok tidak cukup']);
    }

    // 🔥 HITUNG STOK
    $stok_sebelum = $barang->stok;
    $stok_sesudah = $stok_sebelum - $request->jumlah;

    // 🔥 SIMPAN
    \App\Models\BarangKeluar::create([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
        'stok_sebelum' => $stok_sebelum,
        'stok_sesudah' => $stok_sesudah,
    ]);

    // 🔥 UPDATE STOK
    $barang->stok = $stok_sesudah;
    $barang->save();

    return redirect('/barang-keluar')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }
}
