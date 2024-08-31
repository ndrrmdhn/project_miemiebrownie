<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Miemie Brownie | Oleh-oleh Exclusive Tegal</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="/cart/keranjang">
                    <i class="fa fa-shopping-cart" style="color: #3E2723;"></i>
                    @if(Auth::guard('customer')->check())
                        <span class="badge badge-danger">{{ $totalQuantity }}</span>
                    @endif
                </a>
                @if(Auth::guard('customer')->check())
                    <a href="{{ route('customer.profile') }}"><i class="fa fa-user" style="color: #3E2723;"></i></a>
                    <form action="{{ route('customer.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link" style="padding: 0; color: #3E2723; text-decoration: none;">
                            <i class="fa fa-sign-out-alt"></i>
                        </button>
                    </form>
                @else
                    <a href="/customer/login"><i class="fa fa-user" style="color: #3E2723;"></i></a>
                @endif
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Miemie Brownie X Miemie Coffe</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>
                            <li class="{{ request()->is('page/produk') ? 'active' : '' }}"><a href="/page/produk">Produk</a></li>
                            <li class="{{ request()->is('page/tentang') ? 'active' : '' }}"><a href="/page/tentang">Tentang Kami</a>
                                <ul class="dropdown">
                                    <li class="{{ request()->is('page/blog') ? 'active' : '' }}"><a href="/page/blog">Blog Artikel</a></li>
                                </ul>
                            <li class="{{ request()->is('page/mitra') ? 'active' : '' }}"><a href="/page/mitra">Info Kemitraan</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="/cart/keranjang">
                            <i class="fa fa-shopping-cart" style="color: #3E2723;"></i>
                            @if(Auth::guard('customer')->check())
                                <span class="badge badge-danger">{{ $totalQuantity }}</span>
                            @endif
                        </a>
                        @if(Auth::guard('customer')->check())
                        <a href="{{ route('customer.profile') }}"><i class="fa fa-user" style="color: #3E2723;"></i></a>
                            <form action="{{ route('customer.logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-link" style="padding: 0; color: #3E2723; text-decoration: none;">
                                    <i class="fa fa-sign-out-alt"></i>
                                </button>
                            </form>
                        @else
                            <a href="/customer/login"><i class="fa fa-user" style="color: #3E2723;"></i></a>
                        @endif
                    </div>
                </div>                                                                                          
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
    
    <div id="wrapper">
        <div class="main-content">
            <!-- Main Content Begin -->
            @yield('content')
            <!-- Main Content End -->
        </div>
    </div>
    
    <!-- Footer Section Begin -->
    <footer class="footer" style="background-color: #f0f0f0; color: #3E2723;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Lokasi Kami</h6>
                        <address style="color: #3E2723;">
                            Jl Diponegoro No 102<br>
                            Kota Tegal - Jawa Tengah 52125<br>
                            <a href="https://wa.me/628152800800" style="color: #3E2723;"><i class="fa fa-whatsapp"></i> 081 52 800 800</a>
                        </address>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Ikuti Kami</h6>
                        <p style="color: #3E2723;">
                            <a href="https://www.facebook.com/miemiebrownie" style="color: #3E2723;"><i class="fa fa-facebook-f"></i> Facebook</a><br>
                            <a href="https://www.instagram.com/miemiebrownie" style="color: #3E2723;"><i class="fa fa-instagram"></i> Instagram</a><br>
                            <a href="https://www.tiktok.com/@miemie.brownie" style="color: #3E2723;"><i class="fa fa-tiktok"></i> TikTok</a><br>
                            <a href="https://youtube.com/@miemiebrownieofficial" style="color: #3E2723;"><i class="fa fa-youtube-play"></i> Youtube</a><br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Informasi</h6>
                        <p style="color: #3E2723;">
                            <a href="/page/blog" style="color: #3E2723;">Blog Artikel</a><br>
                            <a href="/page/mitra" style="color: #3E2723;">Jadi Mitra</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <div class="footer__about">
                            <h6>Jam Operasional</h6>
                            <p style="color: #3E2723;">
                                Buka setiap hari dari pukul 07:00 hingga 22:00 WIB. <br>
                                Pelajari lebih lanjut tentang Miemie Brownie <a href="https://instabio.cc/20707wemr50" style="color: #FF4DA3;">di sini</a>.
                            </p>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p><strong>&copy; 
                            <script>
                                document.write(new Date().getFullYear());
                            </script> 
                            All rights reserved
                        </strong></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script> 
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>
</body> 
</html>