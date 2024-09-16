<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Pesanan; // Import model Pesanan
use App\Http\Controllers\Controller;

class CustomerFrontend extends Controller
{
    // Fungsi untuk menampilkan profil tanpa bisa diubah (index view)
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        
        // Ambil riwayat transaksi dari pesanan milik customer ini
        $riwayatTransaksi = Pesanan::where('user_id', $customer->id)
            ->with('items.produk') // Ambil produk yang ada di setiap pesanan item
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('frontend.customerdetail.index', compact('customer', 'riwayatTransaksi'));
    }

    // Fungsi untuk menampilkan halaman edit profil
    public function edit()
    {
        $customer = Auth::guard('customer')->user();
        return view('frontend.customerdetail.edit', compact('customer'));
    }

    // Fungsi untuk update profil
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hp' => 'nullable|digits_between:10,13',
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|in:Pria,Wanita',
            'sosmed' => 'nullable|string|max:255',
        ]);

        $customer = Auth::guard('customer')->user();
        $customer->update($request->only(['nama', 'hp', 'alamat', 'jenis_kelamin', 'sosmed']));

        return redirect()->route('customerdetail.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
