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
            <div class="nav-logo"><a href="index.html"><img src="assets/images/logo.png" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
            <div class="auto-container">
                @foreach ($products as $pro)

                @if(Session::get('lang') == 'english')
                <div class="content-box">
                    <div class="title">
                        <h1>{{ optional($pro->get_category_en)->cat_name_en }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
                @else
                <div class="content-box">
                    <div class="title">
                        <h1>{{ optional($pro->get_category_bn)->cat_name_bn }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li>দোকান</li>
                    </ul>
                </div>
                @endif
                @endforeach
            </div>
        </section>
        <!--End Page Title-->


        <!-- shop-page-section -->
        <section class="shop-page-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="shop-sidebar">
                                <div class="sidebar-search">
                                    <form action="shop.html" method="post" class="search-form">
                                        <div class="form-group">
                                            <input type="search" name="search-field" placeholder="Search here" required="">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="sidebar-widget category-widget">
                                    <div class="widget-title">
                                        <h4>Product Category</h4>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="category-list clearfix">
                                            <li><a href="shop-details.html">Honey & Sweets</a></li>
                                            <li><a href="shop-details.html">Forest Honey</a></li>
                                            <li><a href="shop-details.html">Beekeeping</a></li>
                                            <li><a href="shop-details.html">Honeycomb</a></li>
                                            <li><a href="shop-details.html">Natural Honey</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-widget post-widget">
                                    <div class="widget-title">
                                        <h4>Popular Product</h4>
                                    </div>
                                    <div class="post-inner">
                                        <div class="post">
                                            <figure class="post-thumb"><a href="shop-details.html"><img src="assets/images/resource/shop/post-1.png" alt=""></a></figure>
                                            <ul class="rating clearfix">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <h5><a href="shop-details.html">Special honeycomb</a></h5>
                                            <span class="price">$25.99</span>
                                        </div>
                                        <div class="post">
                                            <figure class="post-thumb"><a href="shop-details.html"><img src="assets/images/resource/shop/post-2.png" alt=""></a></figure>
                                            <ul class="rating clearfix">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <h5><a href="shop-details.html">fresh forest honey</a></h5>
                                            <span class="price">$30.99</span>
                                        </div>
                                        <div class="post">
                                            <figure class="post-thumb"><a href="shop-details.html"><img src="assets/images/resource/shop/post-3.png" alt=""></a></figure>
                                            <ul class="rating clearfix">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <h5><a href="shop-details.html">beekeeping honey</a></h5>
                                            <span class="price">$33.99</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-widget price-filter">
                                    <div class="widget-title">
                                        <h4>filter by price</h4>
                                    </div>
                                    <div class="range-slider clearfix">
                                        <div class="clearfix">
                                            <p>Range:</p>
                                            <div class="title"></div>
                                            <div class="input"><input type="text" class="property-amount" name="field-name" readonly></div>
                                        </div>
                                        <div class="price-range-slider"></div>
                                    </div>
                                </div>
                                <div class="advice-box centred">
                                    <div class="inner">
                                        <p>honeycom</p>
                                        <h2>forest honey</h2>
                                        <div class="btn-box"><a href="shop.html">shop now</a></div>
                                        <figure class="image"><img src="assets/images/resource/honey-3.png" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                            <div class="our-shop">
                                <div class="item-shorting clearfix">
                                    <div class="text pull-left">
                                        <p>Showing 1–12 of 14 results</p>
                                    </div>
                                    <div class="short-box pull-right">
                                        <div class="select-box">
                                            <select class="wide">
                                               <option data-display="Default Type">Default Type</option>
                                               <option value="1">Default Short 1</option>
                                               <option value="2">Default Short 2</option>
                                               <option value="3">Default Short 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix centred">
                                    @foreach ($products as $pro)
                                    @if(Session::get('lang') == 'english')
                                    <div class="col-lg-6 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-one">
                                            <div class="inner-box">
                                                @foreach ($pro->get_product_en_avatars as $avtr)
                                                <figure class="image-box"><a href="#"><img src="{{ asset('/images/'.$avtr->front) }}" alt=""></a></figure>
                                                @endforeach
                                                <div class="lower-content">
                                                    <h5><a href="shop-details.html">{{ optional($pro)->product_name_en }}</a></h5>
                                                    @foreach ($attributes->unique('product_en_id') as $attr)
                                                    @if($pro->id == $attr->product_en_id)
                                                    <span class="price">{{ $attr->sale_price_en }} TK</span>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-6 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-one">
                                            <div class="inner-box">
                                                @foreach ($pro->get_product_en_avatars as $avtr)
                                                <figure class="image-box"><a href="#"><img src="{{ asset('/images/'.$avtr->front) }}" alt=""></a></figure>
                                                @endforeach
                                                <div class="lower-content">
                                                    <h5><a href="shop-details.html">{{ optional($pro)->product_name_bn }}</a></h5>
                                                    @foreach ($attributes->unique('product_bn_id') as $attr)
                                                    @if($pro->id == $attr->product_bn_id)
                                                    <span class="price">{{ $attr->sale_price_bn }} টাকা</span>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="pagination-wrapper">
                                    <ul class="pagination centred">
                                        <li><a href="shop.html"><i class="far fa-arrow-left"></i></a></li>
                                        <li><a href="shop.html" class="current">01</a></li>
                                        <li><a href="shop.html">02</a></li>
                                        <li><a href="shop.html">03</a></li>
                                        <li><a href="shop.html"><i class="far fa-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-page-section end -->

        @if(Session::get('lang') == 'english')
        <!-- clients-section -->
        <section class="clients-section">
            <div class="sec-title centred">
                <h2>Our Satisfied Clients</h2>
            </div>
            <div class="auto-container">
                <div class="auto-container">
                    <div class="clients-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                        @foreach ($client as $cl)

                        <figure class="clients-logo-box">
                            <a href="#">
                                <img src="{{  asset('/images/'.optional($cl)->logo) }}" alt=" }}">
                            </a>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @else
        <!-- clients-section -->
        <section class="clients-section">
            <div class="sec-title centred">
                <h2>আমাদের সন্তুষ্ট ক্লায়েন্ট</h2>
            </div>
            <div class="auto-container">
                <div class="auto-container">
                    <div class="clients-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                        @foreach ($client as $cl)

                        <figure class="clients-logo-box">
                            <a href="#">
                                <img src="{{  asset('/images/'.optional($cl)->logo) }}" alt=" }}">
                            </a>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
@section('js')
    <script>

    </script>
@endsection
@endsection
