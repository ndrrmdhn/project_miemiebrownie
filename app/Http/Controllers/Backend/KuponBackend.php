<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kupon;
use Illuminate\Http\Request;

class KuponBackend extends Controller
{
    // Menampilkan halaman index dengan daftar kupon
    public function index()
    {
        $kupons = Kupon::orderBy('id', 'desc')->get();
        return view('backend.diskon.index', [
            'judul' => 'Diskon',
            'sub' => 'Data Diskon',
            'kupons' => $kupons // Make sure 'kupons' is passed to the view
        ]);
    }
    


    // Menampilkan form untuk membuat kupon baru
    public function create()
    {
        return view('backend.diskon.create', [
            'judul' => 'Diskon',
            'sub' => 'Tambah Diskon',
        ]);
    }

    // Menyimpan kupon baru ke dalam database
    public function store(Request $request)
{
    // Validasi dan simpan data sesuai dengan field di form
    $validatedData = $request->validate([
        'kode' => 'required|string|max:255|unique:kupon,kode',
        'diskon' => 'required|integer|min:0',
        'tanggal_kadaluarsa' => 'required|date',
        'status' => 'required|boolean',
    ]);

    // Simpan data ke database
    Kupon::create($validatedData);

    // Redirect ke halaman index setelah berhasil simpan
    return redirect()->route('diskon.index')->with('success', 'Kupon berhasil disimpan.');
}



    public function show(string $id)
    {
        $kupon = Kupon::findOrFail($id);
        return view('backend.diskon.show', [
            'judul' => 'Diskon',
            'sub' => 'Detail Diskon',
            'kupon' => $kupon
        ]);
    }

    // Menampilkan form edit untuk kupon
    public function edit($id)
{
    // Find the kupon by id
    $kupon = Kupon::findOrFail($id);

    // Pass the kupon to the view
    return view('backend.diskon.edit', [
        'judul' => 'Diskon',
        'sub' => 'Ubah Diskon',
        'kupon' => $kupon // Make sure you're passing $kupon
    ]);
}


    // Memperbarui kupon yang sudah ada
    public function update(Request $request, string $id)
    {
        // Find the kupon by its ID
        $kupon = Kupon::findOrFail($id);
    
        // Validation rules
        $rules = [
            'kode' => 'required|string|max:255|unique:kupon,kode,' . $id,
            'diskon' => 'required|numeric|min:0',
            'tanggal_kadaluarsa' => 'required|date|after:today',
            'status' => 'required|boolean',
        ];
    
        // Validate the request
        $validatedData = $request->validate($rules);
    
        // Update kupon with the validated data
        $kupon->update($validatedData);
    
        // Redirect back to the index with a success message
        return redirect()->route('diskon.index')->with('success', 'Kupon berhasil diperbaharui');
    }
    

    // Menghapus kupon dari database
    public function destroy(string $id)
    {
        $kupon = Kupon::findOrFail($id);
        $kupon->delete();
        return redirect()->route('diskon.index')->with('warning', 'Kupon berhasil dihapus');
    }
}
