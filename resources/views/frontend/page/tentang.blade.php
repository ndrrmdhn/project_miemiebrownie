@extends('frontend.layouts.app')
@section('content')
<body>
        <!-- History Section Begin -->
        <div class="history-section">
            <div class="container">
                <section class="about">
                    <div class="row">
                        <div class="col-12">
                            <div class="history-content">
                                <h4>PT Nibras Berkah Mulia</h4>
                                <p class="subtitle">Miemie Brownie</p>
                                <p>
                                    PT Nibras Berkah Mulia adalah sebuah perusahaan dinamis yang bergerak di sektor F&B, dengan fokus pada produk bakery, coffee shop, dan snack. Perusahaan ini menghadirkan beberapa brand unggulan seperti <strong>Miemie Brownie, Miemie Coffee, dan Brownie To Go.</strong>
                                </p>
                                <p>
                                    Didirikan pada bulan November 2016 di Semarang, Jawa Tengah, awalnya beroperasi sebagai toko online selama setahun. Berkat kerja keras dan visi dari pasangan suami istri yang penuh energi, aktif, dan inovatif, Kemudian berhasil membuka <strong>outlet pertama di Kota Tegal</strong> pada akhir tahun 2017.
                                </p>
                                <p>
                                    Pasangan pendiri ini sebelumnya memiliki karir yang cemerlang di perusahaan skala nasional, namun mereka memutuskan untuk meninggalkan dunia profesional dan beralih menjadi pengusaha. Salah satu alasan utama mereka mendirikan Miemie Brownie adalah untuk mewujudkan impian masa muda mereka: memiliki sebuah <strong>bakery shop</strong> yang berpadu dengan <strong>coffee shop</strong>, dan menawarkan oleh-oleh eksklusif di kota yang mereka cintai. Selain itu, mereka juga berkomitmen untuk memberikan dampak positif bagi masyarakat sekitar.
                                </p>
                                <p>
                                    Nama <strong>"Miemie"</strong> sendiri diambil dari panggilan sayang anak-anak kepada sang ibu, yang juga merupakan salah satu pendiri, sehingga memberikan sentuhan personal dan kehangatan pada brand ini.
                                </p>
                                <p>
                                    Dengan dedikasi dan cinta pada setiap produk yang dihasilkan, terus tumbuh dan berinovasi, menghadirkan pengalaman kuliner yang unik dan berkualitas tinggi bagi para pelanggannya.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- History Section End -->

        <!-- Profile Card Section Begin -->
        <section class="profile-card spad">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="profile-card__text">
                            <div class="profile-card__author">
                                <div class="profile-card__author__pic">
                                    <img src="{{ asset('frontend/img/about/miemie.jpg') }}" alt="Profile Author" class="rounded-circle">
                                </div>
                                <div class="profile-card__author__text">
                                    <h5>Evitha Ramadhan</h5>
                                    <p>Owner</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Profile Card Section End -->
    
        <!-- Counter Section Begin -->
    <section class="counter spad" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">8</h2>
                        </div>
                        <span>Tahun Beroperasi</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">50</h2>
                        </div>
                        <span>Lebih Variasi Menu</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">95</h2>
                            <strong>%</strong>
                        </div>
                        <span>Tingkat Kepuasan Pelanggan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->
    
        <!-- Team Section Begin -->
        <section class="team spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Tim Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="team__item">
                            <img src="{{ asset('frontend/img/about/team.jpg') }}" alt="Tim" class="img-fluid decorated-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Section End -->
    
        <!-- Client Section Begin -->
        <section class="clients spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Partner Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel">
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/stifin.png') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/adap.jpg') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/coffe.jpg') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/btg.jpg') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/umkm.jpeg') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/nbm.jpg') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/info_tegal.png') }}" alt="Partner"></a>
                    </div>
                    <div class="client__item">
                        <a href="#"><img src="{{ asset('frontend/img/clients/masjid.png') }}" alt="Partner"></a>
                    </div>
                </div>
            </div>
        <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Owl Carousel JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        </section>
    </div>
    <!-- Client Section End -->
</body>
@endsection