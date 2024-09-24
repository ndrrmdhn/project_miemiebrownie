<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Pesanan;
use App\Models\Cart;
use App\Models\Backend\Kupon;
use App\Models\Backend\PesananItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CheckoutFrontend extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        $customer = auth('customer')->user();
        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Reset diskon setiap kali halaman checkout dibuka ulang
        session()->forget('discount_amount');

        $cartItems = Cart::where('customer_id', $customer->id)->with('product')->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });

        // Mengambil diskon dari sesi jika ada
        $discountAmount = session()->get('discount_amount', 0);
        $total = $subtotal - $discountAmount;

        return view('frontend.checkout.checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'discount' => $discountAmount,
            'total' => $total,
            'customer' => $customer,
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'kode_kupon' => 'required|string',
        ]);

        $coupon = Kupon::where('kode', $request->input('kode_kupon'))->first();

        if (!$coupon || !$coupon->isValid()) {
            return response()->json(['error' => 'Kupon tidak valid atau sudah kadaluarsa'], 400);
        }

        // Ambil customer dan keranjang
        $customer = auth('customer')->user();
        $cartItems = Cart::where('customer_id', $customer->id)->with('product')->get();

        // Hitung total
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });

        // Terapkan diskon
        $discountAmount = ($coupon->diskon / 100) * $cartTotal;
        $totalAfterDiscount = $cartTotal - $discountAmount;

        // Simpan diskon ke sesi
        session()->put('discount_amount', $discountAmount);

        return response()->json([
            'cartTotal' => number_format($totalAfterDiscount, 0, ',', '.'),
            'discount' => number_format($discountAmount, 0, ',', '.'),
            'success' => 'Kupon berhasil diterapkan!'
        ]);
    }

    public function process(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required|string|max:15',
            'payment_method' => 'required',
            'metode_pengiriman' => 'required|string', // Ditambahkan
            'coupon_code' => 'nullable|string',
        ]);

        // Mendapatkan customer
        $customer = auth('customer')->user();

        // Mendapatkan item keranjang
        $cartItems = Cart::where('customer_id', $customer->id)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong, tidak ada item untuk diproses.');
        }

        // Ambil subtotal dari cart items
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });

        // Inisialisasi variabel diskon
        $discountAmount = session()->get('discount_amount', 0); // Ambil diskon dari sesi
        $total = $subtotal - $discountAmount; // Hitung total setelah diskon

        // Menyimpan pesanan ke database
        $pesanan = new Pesanan();
        $pesanan->no_pesanan = uniqid();
        $pesanan->alamat = $request->address;
        $pesanan->metode_pembayaran = $request->payment_method;
        $pesanan->metode_pengiriman = $request->metode_pengiriman;
        $pesanan->nama_customer = $request->first_name . ' ' . $request->last_name;
        $pesanan->no_hp = $request->phone;
        $pesanan->total = $total; // Total setelah diskon diterapkan
        $pesanan->status_pesanan = 'pending';
        $pesanan->user_id = $customer->id;
        $pesanan->tanggal = Carbon::now();
        $pesanan->save();

        // Simpan item pesanan
        foreach ($cartItems as $item) {
            $pesanan->items()->create([
                'produk_id' => $item->product_id,
                'jumlah_pesanan' => $item->quantity,
                'harga' => $item->product->harga,
                'total_harga' => $item->product->harga * $item->quantity,
            ]);
        }

        // Kosongkan keranjang setelah checkout
        Cart::where('customer_id', $customer->id)->delete();

        // Siapkan detail pesanan untuk pesan WhatsApp
        $productDetails = $cartItems->map(function ($item) {
            return "{$item->product->nama_produk} ({$item->quantity}) x Rp " . number_format($item->product->harga, 0, ',', '.');
        })->implode("\n");

        // Tambahkan pesan diskon jika ada
        $discountMessage = $discountAmount > 0 
            ? "Diskon: Rp " . number_format($discountAmount, 0, ',', '.') . "\n"
            : "Diskon: Rp 0\n";

        // Format pesan WhatsApp
        $whatsappMessage = 
"=========================\n" .
"        MIEMIE BROWNIE        \n" .
" Every bake for your happiness \n" .
"=========================\n" .
"Nama: {$request->first_name} {$request->last_name}\n" .
"Alamat: {$request->address}\n" .
"No HP: {$request->phone}\n" .
"Metode Pengiriman: " . ucwords($request->metode_pengiriman) . "\n" . 
"-------------------------\n" .
"Detail Pesanan:\n" .
$productDetails . "\n" .
"-------------------------\n" .
($discountAmount > 0 
   ? "Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "\n" . 
     "Diskon: Rp " . number_format($discountAmount, 0, ',', '.') . "\n"
   : '') . // Kosongkan jika tidak ada diskon
"Total: Rp " . number_format($total, 0, ',', '.') . "\n" .
"Pembayaran: " . ucwords($request->payment_method) . "\n" . 
"=========================\n";


        // Redirect ke WhatsApp dengan pesan
        $whatsappNumber = '628152800800';
        $waLink = "https://wa.me/{$whatsappNumber}?text=" . urlencode($whatsappMessage);
        return redirect($waLink);
    }
}
