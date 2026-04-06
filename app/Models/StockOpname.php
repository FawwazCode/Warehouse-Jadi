<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $fillable = [
        'barang_id',
        'stok_sistem',
        'stok_fisik',
        'selisih',
        'keterangan',
        'tanggal'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
