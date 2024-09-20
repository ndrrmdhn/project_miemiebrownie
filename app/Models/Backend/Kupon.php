<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    protected $table = 'kupon'; // Menentukan tabel kupon
    protected $fillable = ['kode', 'diskon', 'tanggal_kadaluarsa', 'status'];

    public function isValid() {
        return $this->status && $this->tanggal_kadaluarsa >= now();
    }
}
