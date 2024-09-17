<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\PesananItem;

class PesananBatal extends Model
{
    protected $table = 'pesanan_batal';
    protected $fillable = ['no_pesanan', 'nama_customer', 'alamat', 'total', 'tanggal', 'user_id', 'metode_pembayaran'];

    // Relasi dengan Produk
    public function items()
    {
        return $this->hasMany(PesananItem::class, 'pesanan_id');
    }
}
