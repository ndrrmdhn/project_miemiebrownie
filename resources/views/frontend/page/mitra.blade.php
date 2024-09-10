@extends('frontend.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/style-mitra.css') }}">

<div class="welcome-section">
    <div class="container py-5 bg-white rounded shadow-lg" style="background: rgba(255, 255, 255, 0.95);">
        <section class="about">
            <div class="row mb-5">
                <div class="col-lg-12 text-center mb-4 animate__animated animate__fadeInUp">
                    <h2 class="text-pink display-4 font-weight-bold">Selamat Datang</h2>
                    <p class="lead text-muted">Mitra Miemie Brownie di Seluruh Indonesia</p>
                    <div class="underline bg-pink mx-auto mt-3"></div>
                </div>
                <div class="col-lg-10 text-center mx-auto animate__animated animate__fadeInUp">
                    <p class="lead text-dark" style="line-height: 1.8;">
                        Ingin bekerja dari rumah tapi tetap meraih penghasilan jutaan rupiah? <br>
                        Penasaran bagaimana caranya mendapatkan emas murni gratis? <br>
                        Siap memperluas jaringan dan menambah banyak relasi baru? <br>
                        Dan, ingin dibimbing langsung oleh para ahli agar menjadi penjual handal? <br><br>
                        Yuk, simak baik-baik sampai selesai! Semua jawaban yang kamu cari ada di sini.
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- YouTube Section Begin -->
<section class="youtube-section py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12 text-center animate__animated animate__fadeInUp">
                <h4 class="text-black font-weight-bold">Lihat Video Terbaru Kami</h4>
                <div class="underline bg-pink mx-auto" style="width: 100px; height: 4px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="embed-responsive embed-responsive-16by9 mb-3" style="max-width: 80%; margin: auto;">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/IEuOPuanEWc" title="Pemutar video YouTube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p class="lead mb-3">Jangan lewatkan konten eksklusif terbaru kami hanya di YouTube!</p>
                <a href="https://www.youtube.com/@miemiebrownieofficial" target="_blank" class="btn btn-primary btn-custom">
                    <i class="fab fa-youtube mr-2"></i> Miemie Brownie
                </a>
            </div>
        </div>
    </div>
</section>
<!-- YouTube Section End -->

<!-- Description Section Begin -->
<section class="description-section"></section>
<!-- Description Section End -->

<!-- Tentang Mitra Section -->
<div class="container mt-5 py-5 bg-white rounded shadow-lg">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 text-center">
            <img src="{{ asset('frontend/img/mitra/history.jpg') }}" alt="Mitra Miemie Brownie" class="img-fluid rounded shadow-lg mb-4">
        </div>
        <div class="col-lg-6 animate__animated animate__fadeInUp">
            <h4 class="text-pink font-weight-bold">Sekilas tentang Mitra Miemie Brownie</h4>
            <p class="lead text-justify">Miemie Brownie berdiri sejak 2016, memberikan kesempatan bagi Anda untuk maju bersama, mendapatkan penghasilan tambahan atau bahkan menjadi penghasilan utama nantinya. Produk Miemie Brownie dikenal baik oleh semua kalangan, dengan menjaga mutu, kualitas, dan kehalalannya.</p>
        </div>
    </div>
</div>

<!-- Ketentuan dan Etika Section -->
<div class="container mt-5 py-5 bg-white rounded shadow-sm">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 order-lg-2 text-center">
            <img src="{{ asset('frontend/img/mitra/ketent.jpg') }}" alt="Ketentuan dan Etika" class="img-fluid rounded shadow-lg mb-4">
        </div>
        <div class="col-lg-6 order-lg-1 animate__animated animate__fadeInUp">
            <h4 class="text-pink font-weight-bold">Ketentuan dan Etika Menjadi Mitra</h4>
            <ul class="list-unstyled lead">
                <li><i class="fas fa-check-circle"></i> Bawa nama baik diri, keluarga, dan Miemie Brownie.</li>
                <li><i class="fas fa-check-circle"></i> Jadilah inspirasi positif di sekitarmu, baik secara langsung maupun online.</li>
                <li><i class="fas fa-check-circle"></i> Semakin sering belanja (Repeat Order), semakin banyak reward yang didapatkan.</li>
                <li><i class="fas fa-check-circle"></i> Terbuka untuk saran dan masukan. Jangan ragu untuk menghubungi tim admin jika ingin berdiskusi lebih lanjut.</li>
            </ul>
        </div>
    </div>
</div>

<!-- Keuntungan Menjadi Mitra Section -->
<div class="container mt-5 py-5 bg-white rounded shadow-sm">
    <div class="row align-items-center">
        <div class="col-lg-6 text-center">
            <img src="{{ asset('frontend/img/mitra/benefit.jpg') }}" alt="Keuntungan Menjadi Mitra" class="img-fluid rounded shadow-lg mb-4">
        </div>
        <div class="col-lg-6 animate__animated animate__fadeInUp">
            <h4 class="text-pink font-weight-bold">Keuntungan Menjadi Mitra</h4>
            <ul class="list-unstyled lead">
                <li><i class="fas fa-check-circle"></i> Penghasilan tambahan hingga jutaan rupiah.</li>
                <li><i class="fas fa-check-circle"></i> Bekerja secara online dari rumah.</li>
                <li><i class="fas fa-check-circle"></i> Mendapatkan e-banner Mitra Miemie Brownie.</li>
                <li><i class="fas fa-check-circle"></i> Materi promosi, foto promo medsos, dan training online.</li>
                <li><i class="fas fa-check-circle"></i> Hadiah langsung berupa emas murni.</li>
            </ul>
        </div>
    </div>
</div>

<!-- Paket Belanja Section -->
<div class="container py-5 bg-light rounded shadow-sm">
    <div class="row mb-5">
        <div class="col-lg-12 text-center mb-4 animate__animated animate__fadeInUp">
            <h4 class="text-black font-weight-bold">Paket Belanja di Awal</h4>
            <div class="underline bg-pink mx-auto mb-4"></div>
        </div>

        <!-- Paket Platinum -->
        <div class="col-lg-4 col-md-6 animate__animated animate__fadeInUp" style="margin-bottom: 20px">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold" style="color: #e5e4e2;">Paket Platinum</h5>
                    <p class="card-text">Pembelanjaan minimal 18 box Cookies atau senilai Rp 1.500.000</p>
                    <p class="card-text">Benefit:</p>
                    <ul class="list-unstyled lead">
                        <li><i class="fas fa-gem"></i> Hadiah langsung emas murni (0,025 gram)</li>
                        <li><i class="fas fa-chalkboard-teacher"></i> Free training</li>
                        <li><i class="fas fa-comments"></i> Konsultasi dengan owner dan tim marketing</li>
                        <li><i class="fas fa-gift"></i> Free produk Brownie To Go</li>
                        <li><i class="fas fa-tags"></i> Harga khusus mitra</li>
                        <li><i class="fas fa-ad"></i> E-banner dan materi iklan medsos</li>
                        <li><i class="fas fa-pen-alt"></i> Copywriting promosi</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Paket Gold -->
        <div class="col-lg-4 col-md-6 animate__animated animate__fadeInUp" style="margin-bottom: 20px">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold" style="color: #ffd700;">Paket Gold</h5>
                    <p class="card-text">Pembelanjaan minimal 14 box Cookies atau senilai Rp 1.000.000</p>
                    <p class="card-text">Benefit:</p>
                    <ul class="list-unstyled lead">
                        <li><i class="fas fa-gem"></i> Hadiah langsung emas murni (0,025 gram)</li>
                        <li><i class="fas fa-chalkboard-teacher"></i> Free training</li>
                        <li><i class="fas fa-comments"></i> Konsultasi dengan owner dan tim marketing</li>
                        <li><i class="fas fa-tags"></i> Harga khusus mitra</li>
                        <li><i class="fas fa-ad"></i> E-banner dan materi iklan medsos</li>
                        <li><i class="fas fa-pen-alt"></i> Copywriting promosi</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Paket Silver -->
        <div class="col-lg-4 col-md-6 animate__animated animate__fadeInUp" style="margin-bottom: 20px">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold" style="color: #c0c0c0;">Paket Silver</h5>
                    <p class="card-text">Pembelanjaan minimal 10 box Cookies atau senilai Rp 750.000</p>
                    <p class="card-text">Benefit:</p>
                    <ul class="list-unstyled lead">
                        <li><i class="fas fa-chalkboard-teacher"></i> Free training</li>
                        <li><i class="fas fa-comments"></i> Konsultasi dengan owner dan tim marketing</li>
                        <li><i class="fas fa-gift"></i> Free produk Brownie To Go</li>
                        <li><i class="fas fa-tags"></i> Harga khusus mitra</li>
                        <li><i class="fas fa-ad"></i> E-banner dan materi iklan medsos</li>
                        <li><i class="fas fa-pen-alt"></i> Copywriting promosi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tanya Jawab Section -->
<div class="container mt-5 py-5 bg-white rounded shadow-sm">
    <div class="row mb-4">
        <div class="col-lg-12 text-center animate__animated animate__fadeInUp">
            <h4 class="text-black font-weight-bold">Tanya Jawab</h4>
            <div class="underline bg-pink mx-auto"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="frontend-section">
                <!-- FAQ 1 -->
                <div class="faq-item mb-4">
                    <h5 class="font-weight-bold">Apakah harga boleh dinaikkan (upping price)?</h5>
                    <p>Boleh, silakan disesuaikan dengan kondisi market di lokasi Anda. Pastikan tetap kompetitif agar menarik pelanggan. Untuk detail harga, <em>silakan lihat tabel harga yang terlampir.</em></p>
                </div>
                
                <!-- FAQ 2 -->
                <div class="faq-item mb-4">
                    <h5 class="font-weight-bold">Bagaimana jika uang saya belum cukup untuk membeli Paket Platinum?</h5>
                    <p>Anda bisa menawarkan produk dan varian Miemie Brownie ke calon customer seperti saudara, relasi, atau teman terlebih dahulu. Minta pembayaran di awal, dan uang yang terkumpul bisa digunakan untuk membeli paket. Yang terpenting, selalu jaga amanah dan kepercayaan.</p>
                </div>
                
                <!-- FAQ 3 -->
                <div class="faq-item mb-4">
                    <h5 class="font-weight-bold">Saya masih belum mahir memasarkan secara online. Bagaimana solusinya?</h5>
                    <p>Jangan khawatir! Tim Miemie Brownie menyediakan pelatihan online dan konsultasi gratis melalui grup WhatsApp. Selain itu, Anda bisa memanfaatkan materi promosi yang sudah disediakan untuk media sosial. Tim kami siap membimbing Anda.</p>
                </div>
                
                <!-- FAQ 4 -->
                <div class="faq-item mb-4">
                    <h5 class="font-weight-bold">Apakah aman jika saya memesan barang untuk dikirim ke luar kota?</h5>
                    <p>InsyaAllah aman. Kami menggunakan metode pengemasan khusus dengan box Styrofoam untuk menjaga produk tetap segar. Dessert Box dibekukan terlebih dahulu sebelum pengiriman ke luar kota atau luar pulau. Alhamdulillah, pengiriman lancar hingga sekarang.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Us Section Begin -->
<section class="contact-us-section py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center animate__animated animate__fadeInUp">
                <h4 class="text-black font-weight-bold">Hubungi Kami</h4>
                <div class="underline bg-pink mx-auto"></div>
            </div>
        </div>
        <div class="row">
            <!-- Google Maps Embed -->
            <div class="col-md-6 mb-4">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.620987448751!2d109.13790031527188!3d-7.054050294911551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0565c6b51af7%3A0x4d9b3e2c7f3ed8a!2sJl.%20Diponegoro%20No.102%2C%20Panggung%2C%20Kec.%20Tegal%20Tim.%2C%20Kota%20Tegal%2C%20Jawa%20Tengah%2052125%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1609333432152!5m2!1sen!2sus"
                            width="100%" 
                            height="450" 
                            frameborder="0" 
                            style="border:0;" 
                            allowfullscreen="" 
                            aria-hidden="false" 
                            tabindex="0">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6 mb-4">
                <form action="https://formspree.io/f/movabpgv" method="POST" class="contact-form">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="font-weight-bold">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Pesan Anda" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-pink btn-block font-weight-bold">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Section End -->
@endsection