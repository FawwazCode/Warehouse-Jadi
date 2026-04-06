<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\UserController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin', function(){
        $barang = Barang::orderBy('stok','desc')->get();
        $terbanyak = $barang->take(5);
        $tersedikit = $barang->sortBy('stok')->take(5);
        return view('admin.dashboard', compact('terbanyak', 'tersedikit'));
    });

    Route::resource('/barang', \App\Http\Controllers\BarangController::class);
    Route::resource('/supplier', \App\Http\Controllers\SupplierController::class);
    Route::resource('/user', UserController::class);
});
    
Route::middleware(['auth', 'role:petugas'])->group(function(){
    Route::get('/petugas', function(){
        return view('petugas.dashboard');
    });
    Route::resource('/barang-masuk', \App\Http\Controllers\BarangMasukController::class);
    Route::resource('/barang-keluar', BarangKeluarController::class);
});

Route::middleware(['auth', 'role:manajer'])->group(function(){
    Route::get('/manajer', function(){
        return view('manajer.dashboard');
    });
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/laporan/pdf', [LaporanController::class, 'exportPDF']);
});

// Route::get('/barang/export/excel', [BarangController::class, 'exportExcel']);
// Route::get('/barang/export/pdf', [BarangController::class, 'exportPDF']);
    
Route::get('/stock-opname', [StockOpnameController::class, 'index']);
Route::get('/stock-opname/create', [StockOpnameController::class, 'create']);
Route::post('/stock-opname', [StockOpnameController::class, 'store']);

// Route::get('/hash', function(){
//     return bcrypt('123456');
// });
