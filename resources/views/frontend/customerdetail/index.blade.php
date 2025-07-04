@extends('frontend.layouts.app')
@section('title', 'Customer Profile')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/style-customerdetail.css') }}">

<!-- Profile Detail Section Begin -->
<section class="profile-detail spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Detail Profile</h2>
                    <p>Detail Profile kamu tersedia di sini</p>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama:</th>
                        <td>{{ $customer->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <th>No. HP:</th>
                        <td>{{ $customer->hp ?? 'Tidak Diketahui' }}</td>
                    </tr>
                    <tr>
                        <th>Alamat:</th>
                        <td>{{ $customer->alamat ?? 'Tidak Diketahui' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin:</th>
                        <td>
                            @if($customer->jenis_kelamin == 'Pria')
                                Pria
                            @elseif($customer->jenis_kelamin == 'Wanita')
                                Wanita
                            @else
                                Tidak Diketahui
                            @endif
                        </td>                     
                    <tr>
                        <th>Akun Sosmed:</th>
                        <td>{{ $customer->sosmed ?? 'Tidak Diketahui' }}</td>
                    </tr>
                </table>
                <a href="{{ route('customerdetail.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</section>
<!-- Profile Detail Section End -->

<!-- Recent Orders Section Begin -->
<section class="user-orders spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Riwayat Transaksi</h2>
                    <p>Aktivitas pesanan kamu ada di sini</p>
                </div>

                <div class="order-list">
                    @if($riwayatTransaksi->isEmpty())
                        <p>Tidak ada transaksi ditemukan.</p>
                    @else
                        @foreach($riwayatTransaksi as $pesanan)
                        <div class="order-item mb-4 p-3 border rounded shadow-sm">
                            <div class="order-item__header d-flex justify-content-between align-items-center">
                                <h4>Pesanan #{{ $pesanan->no_pesanan }}</h4>
                                <span class="order-status badge {{ $pesanan->status_pesanan }}">
                                    {{ ucfirst($pesanan->status_pesanan) }}
                                </span>
                            </div>
                            <div class="order-item__details mt-2">
                                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pesanan->tanggal)->format('d M Y H:i') }}</p>
                                <p><strong>Total:</strong> Rp {{ number_format($pesanan->total, 0, ',', '.') }}</p>

                                @if($pesanan->items && $pesanan->items->isNotEmpty())
                                    <p><strong>Produk:</strong>
                                        @foreach($pesanan->items as $item)
                                            {{ $item->produk->nama_produk }} ({{ $item->jumlah_pesanan }}x){{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    </p>
                                @else
                                    <p><strong>Produk:</strong> Tidak ada produk ditemukan.</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Recent Orders Section End -->
@endsection