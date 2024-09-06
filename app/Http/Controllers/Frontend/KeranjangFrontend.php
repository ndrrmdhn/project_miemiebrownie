<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Produk;
use App\Models\Backend\Customer; 
use App\Models\Cart;
use Illuminate\Http\Request;

class KeranjangFrontend extends Controller
{
    public function index() {
        // Mengakses user yang login dengan guard customer
        $user = auth('customer')->user();

    if (!$user) {
        return redirect()->route('customer.login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Mengakses cartItems melalui relasi yang didefinisikan di model Customer
    $cartItems = $user->cartItems()->with('product')->get();

    // Mengelompokkan item berdasarkan produk
    $groupedCartItems = $cartItems->groupBy('product_id')->map(function ($items) {
        $firstItem = $items->first();
        
        return [
            'product' => $firstItem->product ?? null, 
            'quantity' => $items->sum('quantity')
        ];
    });

    // Menghitung total harga
    $cartTotal = 0;
    foreach ($groupedCartItems as $items) {
        if ($items['product']) { 
            $cartTotal += $items['product']->harga * $items['quantity'];
        }
    }

    // Menghitung total quantity
    $totalQuantity = $cartItems->sum('quantity');

    return view('frontend.cart.index', [
        'groupedCartItems' => $groupedCartItems,
        'cartTotal' => $cartTotal,
        'totalQuantity' => $totalQuantity
    ]);
}

public function addToCart(Request $request) {
    $quantity = $request->input('quantity', 1);

    // Menggunakan guard 'customer' untuk mendapatkan user yang sedang login
    $user = auth('customer')->user();

    if (!$user) {
        return redirect()->route('customer.login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Menggunakan user yang sudah terautentikasi
    $cartItem = Cart::where('customer_id', $user->id)
        ->where('product_id', $request->product_id)
        ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        Cart::create([
            'customer_id' => $user->id,
            'product_id' => $request->product_id,
            'quantity' => $quantity,
        ]);
    }
    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
}

public function updateCart(Request $request)
{
    $user = auth('customer')->user();

    if (!$user) {
        return response()->json(['error' => 'User not authenticated.'], 401);
    }
    // Validasi input
    $request->validate([
        'items' => 'required|array',
        'items.*.id' => 'required|integer',
        'items.*.quantity' => 'required|integer|min:0',
    ]);
    // Loop melalui items yang dikirim
    foreach ($request->items as $item) {
        $cartItem = $user->cartItems()->where('product_id', $item['id'])->first();
        if ($cartItem) {
            $cartItem->quantity = $item['quantity'];
            $cartItem->save();
        }
    }
    // Menghitung ulang total harga
    $cartTotal = $user->cartItems()->with('product')->get()->sum(function ($cartItem) {
        return $cartItem->product->harga * $cartItem->quantity;
    });

    return response()->json(['cartTotal' => number_format($cartTotal, 0, ',', '.')]);
}

    // Method untuk menghapus item dari cart
    public function removeItem(Request $request)
{
    $user = auth('customer')->user();

    if (!$user) {
        return response()->json(['error' => 'User not authenticated.'], 401);
    }

    // Hapus semua item dengan produk yang sama
    $cartItems = $user->cartItems()->where('product_id', $request->id)->get();
    if ($cartItems) {
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
    }

    // Menghitung ulang total harga
    $cartTotal = $user->cartItems()->with('product')->get()->sum(function ($cartItem) {
        return $cartItem->product->harga * $cartItem->quantity;
    });

    return response()->json(['cartTotal' => number_format($cartTotal, 0, ',', '.')]);
}

}