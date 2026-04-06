<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        // 🔹 BARANG MASUK
        $masuk = BarangMasuk::with(['barang','supplier'])
            ->when($start && $end, function($q) use ($start,$end){
                $q->whereBetween('tanggal', [$start,$end]);
            })
            ->get()
            ->map(function($item){
                return [
                    'tanggal' => $item->tanggal,
                    'nama_barang' => $item->barang->nama_barang ?? '-',
                    'jenis' => 'Masuk',
                    'jumlah' => $item->jumlah,
                    'supplier' => $item->supplier->nama_supplier ?? '-',

                    // 🔥 TAMBAHAN PENTING
                    'stok_sebelum' => $item->stok_sebelum ?? 0,
                    'stok_sesudah' => $item->stok_sesudah ?? 0,
                ];
            });

        // 🔹 BARANG KELUAR
        $keluar = BarangKeluar::with('barang')
            ->when($start && $end, function($q) use ($start,$end){
                $q->whereBetween('tanggal', [$start,$end]);
            })
            ->get()
            ->map(function($item){
                return [
                    'tanggal' => $item->tanggal,
                    'nama_barang' => $item->barang->nama_barang ?? '-',
                    'jenis' => 'Keluar',
                    'jumlah' => $item->jumlah,
                    'supplier' => '-',

                    // 🔥 TAMBAHAN PENTING
                    'stok_sebelum' => $item->stok_sebelum ?? 0,
                    'stok_sesudah' => $item->stok_sesudah ?? 0,
                ];
            });

        // 🔥 GABUNG + SORT
        $data = $masuk->concat($keluar)->sortBy('tanggal')->values();

        return view('manajer.laporan.index', compact('data','start','end'));
    }

    public function exportPDF(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        // 🔹 BARANG MASUK
        $masuk = BarangMasuk::with(['barang','supplier'])
            ->when($start && $end, function($q) use ($start,$end){
                $q->whereBetween('tanggal', [$start,$end]);
            })
            ->get()
            ->map(function ($item){
                return [
                    'tanggal' => $item->tanggal,
                    'nama_barang' => $item->barang->nama_barang ?? '-',
                    'jenis' => 'Masuk',
                    'jumlah' => $item->jumlah,
                    'supplier' => $item->supplier->nama_supplier ?? '-',

                    // 🔥 TAMBAHAN
                    'stok_sebelum' => $item->stok_sebelum ?? 0,
                    'stok_sesudah' => $item->stok_sesudah ?? 0,
                ];
            });

        // 🔹 BARANG KELUAR
        $keluar = BarangKeluar::with('barang')
            ->when($start && $end, function($q) use ($start,$end){
                $q->whereBetween('tanggal', [$start,$end]);
            })
            ->get()
            ->map(function ($item){
                return [
                    'tanggal' => $item->tanggal,
                    'nama_barang' => $item->barang->nama_barang ?? '-',
                    'jenis' => 'Keluar',
                    'jumlah' => $item->jumlah,
                    'supplier' => '-',

                    // 🔥 TAMBAHAN
                    'stok_sebelum' => $item->stok_sebelum ?? 0,
                    'stok_sesudah' => $item->stok_sesudah ?? 0,
                ];
            });

        // 🔥 GABUNG + SORT
        $data = $masuk->concat($keluar)->sortBy('tanggal')->values();

        $pdf = Pdf::loadView('manajer.laporan.pdf', compact('data','start','end'));

        return $pdf->download('laporan-transaksi.pdf');
    }
}