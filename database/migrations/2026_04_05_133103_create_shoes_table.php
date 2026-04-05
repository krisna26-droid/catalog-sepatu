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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // Nama Sepatu
            $table->string('brand');        // Merk (Nike, Adidas, dll)
            $table->integer('price');       // Harga
            $table->text('description');    // Deskripsi Produk
            $table->string('image')->nullable(); // Link/Path Foto
            $table->integer('stock')->default(0); // Jumlah Stok
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
