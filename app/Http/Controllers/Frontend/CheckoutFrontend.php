<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Pesanan;
use App\Models\Cart;
use App\Models\Backend\PesananItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CheckoutFrontend extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        // Mendapatkan data customer yang sedang login
        $customer = auth('customer')->user();
        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Mengambil data item keranjang customer yang sedang login
        $cartItems = Cart::where('customer_id', $customer->id)->with('product')->get();
        
        // Menghitung subtotal dan total harga
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });
        $total = $subtotal;

        // Menampilkan halaman checkout dengan data yang diperlukan
        return view('frontend.checkout.checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'total' => $total,
            'customer' => $customer,
        ]);
    }

    // Memproses form checkout
   // Memproses form checkout
   public function process(Request $request)
   {
       // Memastikan customer sudah login
       $customer = auth('customer')->user();
       if (!$customer) {
           return redirect()->route('customer.login')->with('error', 'Anda harus login terlebih dahulu.');
       }
   
       // Validasi data input form checkout
       $validated = $request->validate([
           'first_name' => 'required',
           'last_name' => 'required',
           'address' => 'required',
           'phone' => 'required|string|max:15', // Validasi untuk nomor HP
           'payment_method' => 'required',
       ]);
   
       // Mengambil item di keranjang customer
       $cartItems = Cart::where('customer_id', $customer->id)->with('product')->get();
   
       // Cek apakah keranjang kosong
       if ($cartItems->isEmpty()) {
           return redirect()->back()->with('error', 'Keranjang kosong, tidak ada item untuk diproses.');
       }
   
       // Menghitung total harga semua item di keranjang
       $total = $cartItems->sum(function ($item) {
           return $item->product->harga * $item->quantity;
       });
   
       // Simpan satu entri dalam tabel `pesanan`
       $pesanan = new Pesanan();
       $pesanan->no_pesanan = uniqid();
       $pesanan->alamat = $request->address;
       $pesanan->metode_pembayaran = $request->payment_method;
       $pesanan->nama_customer = $request->first_name . ' ' . $request->last_name;
       $pesanan->no_hp = $request->phone; // Menyimpan nomor HP
       $pesanan->total = $total; // Total dari seluruh keranjang
       $pesanan->status_pesanan = 'pending';
       $pesanan->user_id = $customer->id;
       $pesanan->tanggal = Carbon::now();
       $pesanan->save();
   
       // Simpan item ke dalam pesanan_item menggunakan relasi
       foreach ($cartItems as $item) {
           $pesanan->items()->create([
               'produk_id' => $item->product_id,
               'jumlah_pesanan' => $item->quantity,
               'harga' => $item->product->harga,
               'total_harga' => $item->product->harga * $item->quantity,
           ]);
       }
   
       // Kosongkan keranjang setelah proses checkout berhasil
       Cart::where('customer_id', $customer->id)->delete();
   
       // Format pesan untuk dikirim ke WhatsApp
       $productDetails = $cartItems->map(function ($item) {
           $product = $item->product;
           $harga = $product->harga ?? 0;
           return "{$product->nama_produk} ({$item->quantity}) x Rp " . number_format($harga, 0, ',', '.');
       })->implode("\n");
   
       $whatsappMessage = 
           "==============================\n" .
           "                    MIEMIE BROWNIE                    \n" .
           "                      KOTA TEGAL                        \n" .
           "==============================\n" .
           "Nama Penerima : {$request->first_name} {$request->last_name}\n" .
           "Alamat Penerima : {$request->address}\n" .
           "No HP : {$request->phone}\n" .  // Menyertakan nomor HP dalam pesan
           "Metode Pengiriman : - \n" . 
           "-----------------------------------------------------------\n" .
           "Detail Pesanan :\n" .
           $productDetails . "\n" . 
           "-----------------------------------------------------------\n" .
           "Total Harga : Rp " . number_format($total, 0, ',', '.') . "\n" .
           "Metode Pembayaran : {$request->payment_method}\n" .
           "==============================\n";
   
       // Mengirim pesan ke WhatsApp
       $whatsappNumber = '6289653600997';
       $waLink = "https://wa.me/{$whatsappNumber}?text=" . urlencode($whatsappMessage);
       return redirect($waLink);
   }
   
}