@extends('frontend.layouts.app')
@section('content')
<body>
        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/11.png')}}"></div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/22.png')}}"></div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/33.png')}}"></div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/44.png')}}"></div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/55.png')}}"></div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/66.png')}}"></div>
                <div class="hero__items set-bg" data-setbg="{{ asset('frontend/img/hero/77.png')}}"></div>
            </div>
        </section>
        <!-- Hero Section End -->
    
        <!-- Banner Section Begin -->
        <section class="banner spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-4">
                        <div class="banner__item">
                            <div class="banner__item__pic">
                                <img src="{{ asset('frontend/img/banner/bolen.jpg')}}" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Bolen <span>Pisang</span></h2>
                                <a href="page/produk">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner__item banner__item--middle">
                            <div class="banner__item__pic">
                                <img src="{{ asset('frontend/img/banner/kayakue.jpg')}}" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>KayaKue <span>Cake</span></h2>
                                <a href="page/produk">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner__item banner__item--last">
                            <div class="banner__item__pic">
                                <img src="{{ asset('frontend/img/banner/dessert.jpg')}}" alt="">
                            </div>
                            <div class="banner__item__text">
                                <h2>Dessert <span>Box</span></h2>
                                <a href="page/produk">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section End -->
    
        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">Bestseller</li>
                        </ul>
                    </div>
                </div>
                <div class="row product__filter">
                    @foreach($bestSellers as $product) 
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" 
                                    data-setbg="{{ asset('storage/img-produk/img_produk_depan/' . $product->img_produk_depan) }}"
                                    onclick="window.location.href='{{ route('produk.detail', $product->id) }}'">
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $product->nama_produk }}</h6>    
                                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="add-cart product-page-cart"> + Tambah Keranjang</button> 
                                    </form>
                                    <h5>Rp {{ number_format($product->harga, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>                
            </div>
        </section>
        <!-- Product Section End -->
    
        <!-- Blog Section Begin -->
        <section class="blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Artikel Terbaru</h2>
                            <p>Lihat Blog Artikel lainnya <a href="{{ url('page/blog') }}" style="color: #FF4DA3">di sini</a></p>
                        </div>
                    </div>
                    
                    @foreach($berita as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/img-berita/thumb_md_'.$item->img_berita) }}"></div>
                            <div class="blog__item__text">
                                <span><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</span>
                                <h5>{{ $item->judul }}</h5>
                                <a href="{{ route('blogdetails', $item->id) }}">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
        
                </div>
            </div>
        </section>
        <!-- Blog Section End -->
</body>
@endsection