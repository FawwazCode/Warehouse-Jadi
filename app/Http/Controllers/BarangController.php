<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use Illuminate\Http\Request;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function show($id)
    {
        $barang = \App\Models\Barang::findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }
    public function index(Request $request)
    {
        $search = $request->search;

        if($search){
            $barang = \App\Models\Barang::where('nama_barang', 'like', "%$search%")
                ->orWhere('kode_barang', 'like', "%$search%")
                ->get();
        } else {
            $barang = \App\Models\Barang::all();
        }
    
        return view('admin.barang.index', compact('barang'));
    }

    public function create()
    {
        $supplier = \App\Models\Supplier::all();
        return view('admin.barang.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $barang = Barang::create($request->except('_token', 'supplier_id'));

        if ($request->supplier_id) {
            $barang->suppliers()->attach($request->supplier_id);
        }

        return redirect('/barang')->with('success','Barang berhasil ditambah');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $supplier = \App\Models\Supplier::all();

        return view('admin.barang.edit', compact('barang', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->except('_token','_method'));

        if ($request->supplier_id) {
            $barang->suppliers()->sync($request->supplier_id);
        } else {
            $barang->suppliers()->detach();
        }

        return redirect('/barang')->with('success','Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect('/barang')->with('success','Barang berhasil dihapus');
    }

}