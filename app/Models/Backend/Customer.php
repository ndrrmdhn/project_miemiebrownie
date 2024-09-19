<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; // Tambahkan jika belum ada
use App\Models\Cart;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customer';

    protected $fillable = [
        'nama',
        'email',
        'hp',
        'alamat',
        'jenis_kelamin',
        'sosmed',
        'password',
    ];
    // Daftar atribut yang harus disembunyikan dalam serialisasi
    protected $hidden = ['password', 'remember_token'];

    // Relasi satu ke banyak dengan model Cart
    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }
    
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'user_id');
    }
}
