@extends('layouts.frontend.app')

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
                @if(Session::get('lang') == 'english')
                <div class="content-box">
                    <div class="title">
                        <h1>All Products</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
                @else
                <div class="content-box">
                    <div class="title">
                        <h1>আমাদের পণ্য সমূহ</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li>দোকান</li>
                    </ul>
                </div>
                @endif
            </div>
        </section>
        <!--End Page Title-->

    @foreach ($categories as $cat)
    @if(!$cat->get_product->isEmpty())
    @if(Session::get('lang') == 'english')
        <section class="related-product centred">
            <div class="auto-container">
                <div class="sec-title style-two centred">
                    <h2>{{ optional($cat)->cat_name_en }}</h2>
                </div>
                <div class="row clearfix">
                    @foreach ($cat->get_product as $pro)
                    @foreach ($pro->get_attribute as $attr)
                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one">
                            <div class="inner-box">
                                @foreach($attr->get_product_avatar as $avtr)
                                <figure class="image-box"><a href="{{ url('/product-details/'.$pro->slug_bn.'/'.$attr->weight_bn) }}">
                                    <img style="height: 300px;padding: 20px;" src="{{ asset('/images/'.optional($avtr)->front) }}" alt=""></a>
                                </figure>
                                @endforeach
                                <div class="lower-content">
                                    <h5><a href="{{ url('/product-details/'.$pro->slug_en.'/'.$attr->weight_en) }}">{{ optional($pro)->product_name_en }}</a></h5>
                                    <span class="price">Weight - {{ optional($attr)->weight_en }}</span>
                                    <span class="price">Price - {{ optional($attr)->sale_price_en }} TK</span>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    @else
    <section class="related-product centred">
        <div class="auto-container">
            <div class="sec-title style-two centred">
                <h2>{{ optional($cat)->cat_name_bn }}</h2>
            </div>
            <div class="row clearfix">
                @foreach ($cat->get_product as $pro)
                @foreach ($pro->get_attribute as $attr)
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    <div class="shop-block-one">
                        <div class="inner-box">
                            @foreach($attr->get_product_avatar as $avtr)
                            <figure class="image-box"><a href="{{ url('/product-details/'.$pro->slug_bn.'/'.$attr->weight_bn) }}">
                                <img style="height: 300px;
                                padding: 20px;" src="{{ asset('/images/'.optional($attr->get_product_avatar[0])->front) }}" alt=""></a>
                            </figure>
                            @endforeach
                            <div class="lower-content">
                                <h5><a href="shop-details.html">{{ optional($pro)->product_name_bn }}</a></h5>
                                <span class="price">ওজন - {{ optional($attr)->weight_bn }}</span>
                                <span class="price">মূল্য - {{ optional($attr)->sale_price_bn }} টাকা</span>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endif
    @endforeach
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
        // $(window).scroll
        // (
        //     function (event)
        //     {
        //         var scrolled_val = window.scrollY;
        //         if (scrolled_val > 50) {
        //             $(".main-header").addClass('fixed-header');
        //         }
        //     }
        // );
    </script>
@endsection
@endsection


