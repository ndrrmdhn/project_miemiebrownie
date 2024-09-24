@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Selamat Datang -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-center">Selamat Datang, {{ auth()->user()->nama }}!</h2>
                <p class="text-center text-muted">Berikut adalah ringkasan aktivitas di toko Anda.</p>
            </div>
        </div>

        <!-- Statistik Dashboard -->
        <div class="row">
            <!-- Jumlah Pengunjung -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Jumlah Pengunjung</h5>
                        <span class="badge badge-primary">{{ $jumlahPengunjung }}</span>
                    </div>
                </div>
            </div>

            <!-- Jumlah Customer -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-user-check fa-3x mb-3 text-success"></i>
                        <h5 class="card-title">Jumlah Customer</h5>
                        <span class="badge badge-success">{{ $jumlahCustomer }}</span>
                    </div>
                </div>
            </div>

            <!-- Jumlah Berita -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-newspaper fa-3x mb-3 text-info"></i>
                        <h5 class="card-title">Jumlah Berita</h5>
                        <span class="badge badge-info">{{ $jumlahBerita }}</span>
                    </div>
                </div>
            </div>

            <!-- Jumlah Produk -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-box fa-3x mb-3 text-warning"></i>
                        <h5 class="card-title">Jumlah Produk</h5>
                        <span class="badge badge-warning">{{ $jumlahProduk }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pesanan -->
        <div class="row">
            <!-- Pesanan Pending -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-hourglass-start fa-3x mb-3 text-warning"></i> 
                        <h5 class="card-title">Pesanan Pending</h5>
                        <span class="badge badge-warning">{{ $jumlahPesananPending }}</span> 
                    </div>
                </div>
            </div>

            <!-- Pesanan Proses -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-cogs fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Pesanan Proses</h5>
                        <span class="badge badge-primary">{{ $jumlahPesananProses }}</span>
                    </div>
                </div>
            </div>

            <!-- Pesanan Selesai -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-check fa-3x mb-3 text-success"></i>
                        <h5 class="card-title">Pesanan Selesai</h5>
                        <span class="badge badge-success">{{ $jumlahPesananSelesai }}</span>
                    </div>
                </div>
            </div>

            <!-- Pesanan Batal -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-times fa-3x mb-3 text-danger"></i> 
                        <h5 class="card-title">Pesanan Batal</h5>
                        <span class="badge badge-danger">{{ $jumlahPesananBatal }}</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection