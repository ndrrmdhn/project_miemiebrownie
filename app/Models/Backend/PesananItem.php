<?php

// Model PesananItem.php
namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class PesananItem extends Model
{
    protected $table = 'pesanan_item';

    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah_pesanan', 'harga', 'total_harga'];

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Relasi ke model Pesanan untuk semua tipe pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    // Relasi ke model Pesanan Selesai
    public function pesananSelesai()
    {
        return $this->belongsTo(PesananSelesai::class, 'pesanan_id');
    }

    // Relasi ke model Pesanan Batal
    public function pesananBatal()
    {
        return $this->belongsTo(PesananBatal::class, 'pesanan_id');
    }
}

