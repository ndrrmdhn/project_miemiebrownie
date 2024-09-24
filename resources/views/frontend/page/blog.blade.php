@extends('frontend.layouts.app')
@section('content')
<body>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('frontend/img/info.png') }}">
        <div class="overlay">
            <div class="content">  
            </div>
        </div>
    </section>
    <div class="content2">
        <h1>Blog Artikel</h1>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach ($berita as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/img-berita/thumb_md_' . $item->img_berita) }}"></div>
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

    <style>
    @media (max-width: 576px) { 
        .blog__item__text h5 {
            color: #0d0d0d;
            font-weight: 700;
            font-size: 0.9rem;
            line-height: 28px;
            margin-bottom: 10px;
        }

        .blog__item__text a {
            display: inline-block;
            color: #111111;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            padding: 3px 0;
            position: relative;
        }

        .blog__item__text a:after {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #111111;
            content: "";
            -webkit-transition: all, 0.3s;
            -o-transition: all, 0.3s;
            transition: all, 0.3s;
        }
    }
    </style>
</body>
@endsection