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
        $table->string('nama_produk');
        $table->boolean('status');
        $table->float('harga');
        $table->text('deskripsi');
        $table->string('img_produk_depan')->nullable();
        $table->string('img_produk_belakang')->nullable();
        $table->string('img_produk_kanan')->nullable();
        $table->string('img_produk_kiri')->nullable();
        $table->unsignedBigInteger('kategori_id');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
        $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
