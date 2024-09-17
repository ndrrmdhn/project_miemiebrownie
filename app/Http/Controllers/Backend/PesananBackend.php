<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Backend\Pesanan;
use App\Models\Backend\Produk;

class PesananBackend extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::orderBy('id', 'desc')->get();
        return view('backend.pesanan.index', [
            'judul' => 'Pesanan',
            'sub' => 'Data Pesanan',
            'pesanan' => $pesanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::orderBy('nama_produk', 'asc')->get();
        return view('backend.pesanan.create', [
            'judul' => 'Pesanan',
            'sub' => 'Tambah Pesanan',
            'produk' => $produk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama_customer' => 'required|string|max:255',
        'produk_id' => 'required|exists:produk,id', 
        'jumlah_pesanan' => 'required|integer',
        'alamat' => 'required|string',
        'metode_pembayaran' => 'required|in:bank_transfer,credit_card,cod', // Perbaiki metode pembayaran
        'total_pesanan' => 'required|numeric',
    ]);

    // Menghasilkan nomor pesanan dengan format tanggal-angka_acak
    $tanggal = Carbon::now()->format('Ymd');
    $angka_acak = Str::upper(Str::random(8));
    $no_pesanan = "{$tanggal}{$angka_acak}";

    // Menyimpan data pesanan
    $validatedData['no_pesanan'] = $no_pesanan;
    $validatedData['status_pesanan'] = $validatedData['status_pesanan'] ?? 'pending'; // Set status sebagai 'pending' jika tidak ada status yang diberikan
    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['tanggal'] = Carbon::now();

    // Buat pesanan
    $pesanan = Pesanan::create($validatedData);

    // Ambil data cart dari session atau database
    $cartItems = auth('customer')->user()->cartItems;

    // Proses setiap item di dalam keranjang belanja
    foreach ($cartItems as $item) {
        if ($item->product && $item->product->harga !== null) {
            // Simpan detail produk dari keranjang
            $pesanan->items()->create([
                'produk_id' => $item->product_id,
                'jumlah_pesanan' => $item->quantity,
                'harga' => $item->product->harga,
                'total' => $item->product->harga * $item->quantity,
            ]);
        } else {
            Log::error('Produk tidak valid atau harga produk adalah null', ['product_id' => $item->product_id]);
        }
    }

    // Hapus keranjang setelah pesanan berhasil diproses
    auth('customer')->user()->cartItems()->delete();

    // Redirect ke halaman pesanan dengan pesan sukses
    return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
}

public function edit(string $id)
{
    // Mengambil satu instance pesanan berdasarkan id
    $pesanan = Pesanan::findOrFail($id); // Mengambil satu item, bukan collection
    $produk = Produk::orderBy('id', 'asc')->get(); // Ini mengambil collection, karena beberapa produk akan ditampilkan

    return view('backend.pesanan.edit', [
        'judul' => 'Pesanan',
        'sub' => 'Ubah Pesanan',
        'produk' => $produk, // Mengirimkan collection produk ke view
        'edit' => $pesanan   // Mengirimkan single instance pesanan ke view
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $pesanan = Pesanan::findOrFail($id);

    // Validasi input
    $validatedData = $request->validate([
        'status_pesanan' => 'required|in:pending,proses,selesai,batal',
        'nama_customer' => 'required|string|max:255',
        'alamat' => 'required|string',
    ]);

    if ($validatedData['status_pesanan'] == 'selesai') {
        // Pindahkan pesanan ke tabel pesanan_selesai
        DB::transaction(function () use ($pesanan, $validatedData) {
            DB::table('pesanan_selesai')->insert([
                'no_pesanan' => $pesanan->no_pesanan,
                'nama_customer' => $pesanan->nama_customer,
                'alamat' => $pesanan->alamat,
                'total' => $pesanan->total,
                'tanggal' => $pesanan->tanggal,
                'user_id' => $pesanan->user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pesanan->delete(); // Hapus dari tabel pesanan
        });
    } elseif ($validatedData['status_pesanan'] == 'batal') {
        // Pindahkan pesanan ke tabel pesanan_batal
        DB::transaction(function () use ($pesanan, $validatedData) {
            DB::table('pesanan_batal')->insert([
                'no_pesanan' => $pesanan->no_pesanan,
                'nama_customer' => $pesanan->nama_customer,
                'alamat' => $pesanan->alamat,
                'total' => $pesanan->total,
                'tanggal' => $pesanan->tanggal,
                'user_id' => $pesanan->user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pesanan->delete(); // Hapus dari tabel pesanan
        });
    } else {
        // Update data pesanan biasa
        $pesanan->update($validatedData);
    }

    return redirect()->route('pesanan.index')->with('success', 'Data berhasil diperbaharui');
}
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect('backend/pesanan')->with('success', 'Pesanan berhasil dihapus');
    }

    /**
     * Get harga produk berdasarkan produk ID
     */
    public function getIdProduk(Request $request)
    {
        $produk = Produk::find($request->produk_id);

        if ($produk) {
            return response()->json(['hargaProduk' => $produk->harga]);
        } else {
            return response()->json(['hargaProduk' => null]);
        }
    }
    public function selesai()
{
    // Ambil data dari model PesananSelesai
    $pesananSelesai = \App\Models\Backend\PesananSelesai::all();
    
    return view('backend.pesanan.selesai', [
        'judul' => 'Pesanan Selesai',
        'sub' => 'Data Pesanan Selesai',
        'pesanan' => $pesananSelesai
    ]);
}

public function batal()
{
   
    // Ambil data dari model PesananBatal
    $pesananBatal = \App\Models\Backend\PesananBatal::all();
    
    return view('backend.pesanan.batal', [
        'judul' => 'Pesanan Batal',
        'sub' => 'Data Pesanan Batal',
        'pesanan' => $pesananBatal
    ]);
}

public function destroySelesai($id)
{
    // Ambil pesanan selesai berdasarkan id
    $pesananSelesai = DB::table('pesanan_selesai')->where('id', $id)->first(); // first() mengembalikan satu item

    // Jika pesanan selesai ditemukan
    if ($pesananSelesai) {
        // Hapus pesanan selesai
        DB::table('pesanan_selesai')->where('id', $id)->delete();
        return redirect()->route('pesanan.selesai')->with('success', 'Pesanan selesai berhasil dihapus.');
    }

    return redirect()->route('pesanan.selesai')->with('error', 'Pesanan tidak ditemukan.');
}

public function destroyBatal($id)
{
    // Ambil pesanan batal berdasarkan id
    $pesananBatal = DB::table('pesanan_batal')->where('id', $id)->first(); // first() mengembalikan satu item

    // Jika pesanan batal ditemukan
    if ($pesananBatal) {
        // Hapus pesanan batal
        DB::table('pesanan_batal')->where('id', $id)->delete();
        return redirect()->route('pesanan.batal')->with('success', 'Pesanan batal berhasil dihapus.');
    }

    return redirect()->route('pesanan.batal')->with('error', 'Pesanan tidak ditemukan.');
}
}
