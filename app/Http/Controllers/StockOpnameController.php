<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StockOpname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
     public function index()
    {
        $data = StockOpname::with('barang')->get();
        
        return view('petugas.stock-opname.index', compact('data'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('petugas.stock-opname.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_fisik' => 'required|numeric|min:0',
            'tanggal' => 'required'
        ]);

        $barang = Barang::find($request->barang_id);

        $stok_sistem = $barang->stok;
        $stok_fisik = $request->stok_fisik;
        $selisih = $stok_fisik - $stok_sistem;

        // SIMPAN DATA OPNAME
        StockOpname::create([
            'barang_id' => $request->barang_id,
            'stok_sistem' => $stok_sistem,
            'stok_fisik' => $stok_fisik,
            'selisih' => $selisih,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal
        ]);

        // UPDATE STOK BARANG
        $barang->stok = $stok_fisik;
        $barang->save();

        return redirect('/stock-opname')->with('success','Stock opname berhasil');
    }
}
