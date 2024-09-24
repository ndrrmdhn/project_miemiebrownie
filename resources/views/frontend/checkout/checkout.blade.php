@extends('frontend.layouts.app')

@section('title', 'Checkout')

@section('content')
<link rel="stylesheet" href="{{ asset('frontend/css/style-checkout.css') }}">

<!-- Checkout Form Section -->
<div class="container py-5">
    <div class="row">
        <!-- Checkout Form -->
        <div class="col-lg-8 col-md-12">
            <div class="checkout-form shadow-sm p-4 rounded bg-white">
                <h4 class="mb-4" style="border-bottom: 2px solid #FF4DA3; padding-bottom: 10px; font-weight: bold; text-align: center;">
                    Detail Pembayaran
                </h4>                
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name">Nama Depan<span class="text-danger">*</span></label>
                            <input type="text" id="first_name" name="first_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name">Nama Belakang<span class="text-danger">*</span></label>
                            <input type="text" id="last_name" name="last_name" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="address">Alamat<span class="text-danger">*</span></label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Alamat Jalan" required>
                            <input type="text" name="address2" class="form-control mt-2" placeholder="Apartemen, suite, unit, dll (opsional)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city">Kota/Kabupaten<span class="text-danger">*</span></label>
                            <input type="text" id="city" name="city" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state">Provinsi<span class="text-danger">*</span></label>
                            <input type="text" id="state" name="state" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Telepon<span class="text-danger">*</span></label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $customer->email }}" disabled>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="order_notes">Catatan Pesanan</label>
                            <textarea id="order_notes" name="order_notes" class="form-control" rows="3" placeholder="Catatan khusus untuk pesanan Anda."></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="metode_pengiriman" class="form-label">Metode Pengiriman <span class="text-danger">*</span></label><br>
                            <select name="metode_pengiriman" id="metode_pengiriman" class="form-select" required>
                                <option value="diambil">Diambil</option>
                                <option value="dikirim">Dikirim</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="payment_method" class="form-label">Metode Pembayaran <span class="text-danger">*</span></label><br>
                            <select id="payment_method" name="payment_method" class="form-select" required>
                                <option value="" disabled>Pilih Metode Pembayaran</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="qris">Qris</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; margin-top: 1rem;">
                        <button type="submit" class="btn btn-primary" style="width: 80%; max-width: 400px;">BUAT PESANAN</button>
                    </div>                    
                </form>
            </div>
        </div>

       <!-- Order Summary --> 
       <div class="col-lg-4 col-md-12 mt-4 mt-md-0">
        <!-- Promo Code Section -->
        <div class="cart__discount">
            <h6>Pakai Kode, Lebih Hemat!</h6>
            <form id="apply-coupon-form">
                <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
                <input type="hidden" id="apply-coupon-url" value="{{ route('checkout.apply-coupon') }}">
                <input type="text" name="kode_kupon" id="kode_kupon" placeholder="Kode Promo">
                <button type="submit">Klaim!</button>
            </form>
            <p id="coupon-message"></p>                   
        </div>
    
        <div class="order-summary shadow-sm p-4 rounded bg-white">
            <h4 class="mb-4" style="border-bottom: 2px solid #FF4DA3; padding-bottom: 10px; font-weight: bold; text-align: center;">
                Ringkasan Pesanan
            </h4>
    
            <!-- Section for displaying discount -->
            <div id="discount_section" style="display: none;">
                <div class="d-flex justify-content-between mt-2">
                    <strong>Diskon</strong>
                    <span id="discount-total">Rp 0</span>
                </div>
            </div>
    
            <div class="d-flex justify-content-between mt-2">
                <strong>Total</strong>
                <span id="checkout-total">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
    
            <div class="mt-1">
                <small class="text-muted">*harga belum termasuk ongkir</small>
            </div>
        </div>
    </div>               
</div> 
    </div>
</div>

<script src="{{ asset('frontend/js/app-checkout.js') }}" defer></script>
@endsection