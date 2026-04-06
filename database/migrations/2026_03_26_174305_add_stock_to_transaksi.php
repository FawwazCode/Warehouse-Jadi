<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->integer('stok_sebelum')->nullable();
            $table->integer('stok_sesudah')->nullable();
        });

        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->integer('stok_sebelum')->nullable();
            $table->integer('stok_sesudah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->dropColumn(['stok_sebelum', 'stok_sesudah']);
        });

        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->dropColumn(['stok_sebelum', 'stok_sesudah']);
        });
    }
};
