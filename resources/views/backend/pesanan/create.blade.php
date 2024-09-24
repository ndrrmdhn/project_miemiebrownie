@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $sub }}</h5>
                <form action="{{ route('pesanan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ old('nama_customer') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="produk_id">Produk</label>
                        <select class="form-control" id="produk_id" name="produk_id" required>
                            <option value="">Pilih Produk</option>
                            @foreach ($produk as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_produk }} (Rp. {{ number_format($item->harga, 0, ',', '.') }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pesanan">Jumlah Produk</label>
                        <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="bank_transfer">Transfer Bank</option>
                            <option value="qris">Qris</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_pesanan">Total</label>
                        <input type="number" class="form-control" id="total_pesanan" name="total_pesanan" value="{{ old('total_pesanan') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
