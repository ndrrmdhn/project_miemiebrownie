<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Customer;
use App\Models\Backend\Berita;
use App\Models\Backend\Pesanan;
use App\Models\Backend\Produk;

class HomeBackend extends Controller
{
    public function index()
    {
        $jumlahCustomer = Customer::count();
        $jumlahBerita = Berita::count();
        $jumlahPesananPending = Pesanan::where('status_pesanan', 'pending')->count();
        $jumlahPesananProses = Pesanan::where('status_pesanan', 'proses')->count();
        $jumlahPesananSelesai = Pesanan::where('status_pesanan', 'selesai')->count();
        $jumlahPesananBatal = Pesanan::where('status_pesanan', 'batal')->count();

        $jumlahProduk = Produk::count();

        $jumlahPengunjung = 0; 

        return view('backend.home.index', [
            'judul' => 'Beranda',
            'sub' => 'Data Beranda',
            'jumlahPengunjung' => $jumlahPengunjung,
            'jumlahCustomer' => $jumlahCustomer,
            'jumlahBerita' => $jumlahBerita,
            'jumlahPesananPending' => $jumlahPesananPending,
            'jumlahPesananProses' => $jumlahPesananProses,
            'jumlahPesananSelesai' => $jumlahPesananSelesai,
            'jumlahPesananBatal' => $jumlahPesananBatal,
            'jumlahProduk' => $jumlahProduk,
        ]);
    }
}
