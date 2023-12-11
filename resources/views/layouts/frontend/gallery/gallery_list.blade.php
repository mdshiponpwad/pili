@extends('layouts.frontend.app')
@section('title')
    @if(Session::get('lang') == 'english')
        {{optional($title)->title_en}}
    @else
        {{optional($title)->title_bn}}
    @endif
@endsection
@section('meta')
   @foreach($metas as $meta)
    @if(Session::get('lang') == 'english')
        <meta name="{{optional($meta)->meta_name_en}}" content="{{optional($meta)->meta_des_en}}">
    @else
        <meta name="{{optional($meta)->meta_name_bn}}" content="{{optional($meta)->meta_des_bn}}">
    @endif
    
   @endforeach
@endsection
@section('content')
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo"><a style="font-size: 30px;color: #fff;font-weight: 700;" href="{{route('home')}}"><img style="height:50px;margin-right: 30px;" src="{{asset('/images/'.optional($setting)->logo)}}" alt="" title="">Pili Honey</a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            @if(Session::get('lang') == 'english')
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>{{ optional($setting)->address_en }}</li>
                    <li><a href="tel:+{{optional($setting)->phn_en}}">+{{optional($setting)->contact_en}}</a></li>
                    <li><a href="mailto:{{optional($setting)->email}}">{{optional($setting)->email}}</a></li>
                </ul>
            </div>
            @else 
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>{{ optional($setting)->address_bn }}</li>
                    <li><a href="tel:+{{optional($setting)->phn_en}}">+{{optional($setting)->contact_bn}}</a></li>
                    <li><a href="mailto:{{optional($setting)->email}}">{{optional($setting)->email}}</a></li>
                </ul>
            </div>
            @endif
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="{{ optional($setting)->fb_link }}"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="{{ optional($setting)->tube_link }}"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>

    @if(Session::get('lang') == 'english')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>Gallery List</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Gallery List</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- news-section -->
    <section class="blog-grid">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($gallery as $gal)
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img style="height: 290px !important;" src="{{ asset('/images/'.optional($gal)->image) }}" alt="">
                            </figure>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!--<div class="pagination-wrapper centred">-->
            <!--    <ul class="pagination centred">-->
            <!--        <li><a href="shop.html"><i class="far fa-arrow-left"></i></a></li>-->
            <!--        <li><a href="shop.html" class="current">01</a></li>-->
            <!--        <li><a href="shop.html">02</a></li>-->
            <!--        <li><a href="shop.html">03</a></li>-->
            <!--        <li><a href="shop.html"><i class="far fa-arrow-right"></i></a></li>-->
            <!--    </ul>-->
            <!--</div>-->
        </div>
    </section>
    <!-- news-section end -->
    @else
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>গ্যালারী তালিকা</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">হোম</a></li>
                    <li>গ্যালারী তালিকা</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- news-section -->
    <section class="blog-grid">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($gallery as $gal)
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img style="height: 290px !important;" src="{{ asset('/images/'.optional($gal)->image) }}" alt="">
                            </figure>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!--<div class="pagination-wrapper centred">-->
            <!--    <ul class="pagination centred">-->
            <!--        <li><a href="shop.html"><i class="far fa-arrow-left"></i></a></li>-->
            <!--        <li><a href="shop.html" class="current">০১</a></li>-->
            <!--        <li><a href="shop.html">০২</a></li>-->
            <!--        <li><a href="shop.html">০৩</a></li>-->
            <!--        <li><a href="shop.html"><i class="far fa-arrow-right"></i></a></li>-->
            <!--    </ul>-->
            <!--</div>-->
        </div>
    </section>
    <!-- news-section end -->
    @endif
@endsection
