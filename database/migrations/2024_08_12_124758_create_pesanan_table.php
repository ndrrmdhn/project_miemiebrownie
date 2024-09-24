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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->unique();
            $table->text('alamat');
            $table->string('no_hp');
            $table->enum('metode_pembayaran', ['bank_transfer', 'QRIS']);
            $table->enum('metode_pengiriman', ['diambil', 'dikirim']); 
            $table->string('nama_customer');
            $table->decimal('total', 15, 2); // Total seluruh pesanan
            $table->string('status_kode')->nullable();
            $table->string('transaksi_id')->nullable(); 
            $table->datetime('tanggal')->default(now());
            $table->enum('status_pesanan', ['pending', 'proses', 'selesai', 'batal']);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            // Relasi foreign key
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
