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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('foto_barang');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_cabang');
            $table->unsignedBigInteger('id_supplier');
            $table->string('harga_jual');
            $table->string('harga_beli');
            $table->string('stok');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_cabang')->references('id')->on('cabang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_supplier')->references('id')->on('supplier')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
