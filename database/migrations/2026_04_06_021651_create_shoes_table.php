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
            $table->string('brand');        // Merk 
            $table->integer('price');       // Harga 
            $table->text('description');    // Deskripsi panjang
            $table->string('image')->nullable(); // Nama file gambar
            $table->integer('stock')->default(0); // Jumlah stok
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
