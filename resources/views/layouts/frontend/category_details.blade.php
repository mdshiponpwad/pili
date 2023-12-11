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
<div style="background-image: url(/assets/images/honeycomb.jpg)">
    
    <section class="page-title centred"
        style="background-image: url('/assets/images/background/cta-1.jpg');">
        <div class="auto-container">
            @if (Session::get('lang') == 'english')
            <div class="content-box">
                <div class="title">
                    <h1>{{ optional($cat)->cat_name_en }}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ optional($cat)->cat_name_en }}</li>
                </ul>
            </div>
            @else
            <div class="content-box">
                <div class="title">
                    <h1>{{ optional($cat)->cat_name_bn }}</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">হোম</a></li>
                    <li>{{ optional($cat)->cat_name_bn }}</li>
                </ul>
            </div>
            @endif
        </div>
    </section>

    <div class="xs-sidebar-group info-group info-sidebar">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="index.html" class="close-side-widget">X</a>
                </div>
                <div class="sidebar-textwidget">
                    <div class="sidebar-info-contents">
                        @if (Session::get('lang') == 'english')
                        <div class="content-inner">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo-2.png" alt="" /></a>
                            </div>
                            <div class="content-box">
                                <h4>{{ optional($cat)->cat_name_en }}</h4>
                                <p>{!! htmlspecialchars_decode(optional($cat)->description_en) !!}</p>
                            </div>
                            {{-- <div class="form-inner">
                                    <h4>Get a free quote</h4>
                                    <form action="index.html" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message..."></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn-one">Submit Now</button>
                                        </div>
                                    </form>
                                </div> --}}
                        </div>
                        @else
                        <div class="content-inner">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo-2.png" alt="" /></a>
                            </div>
                            <div class="content-box">
                                <h4>{{ optional($cat)->cat_name_bn }}</h4>
                                <p>{!! htmlspecialchars_decode(optional($cat)->description_bn) !!}</p>
                            </div>
                            {{-- <div class="form-inner">
                                    <h4>Get a free quote</h4>
                                    <form action="index.html" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message..."></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn-one">Submit Now</button>
                                        </div>
                                    </form>
                                </div> --}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <section class="related-product centred">
        <div class="auto-container">
            @if (Session::get('lang') == 'english')
            <div class="row clearfix">
                @foreach ($products as $pro)
                @foreach ($pro->get_attribute as $attr)
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    @if($attr->qty_en !== 0)
                    <span class="mobile-available normal-available badge badge-success">Available</span>
                    @else
                    <span class="mobile-pre-order normal-pre-order badge badge-danger">
                    <marquee width="85%" direction="left" height="30%" scrollamount="3">
                        Stock Out.If you want to pre-order this product please <a style="color:#fff;" href="{{ url('/contact-us') }}">Click here</a>.
                    </marquee>
                    <a class="badge badge-success" style="color:#fff;margin-left: 5px" href="{{ url('/contact-us') }}">Click</a>
                    @endif
                    </span>
                    <div class="shop-block-one">
                        <div class="inner-box">
                            @foreach($attr->get_product_avatar as $avtr)
                            <figure class="image-box"><a
                                    href="{{ url('/product-details/'.$pro->slug_en.'/'.$attr->weight_en) }}">
                                    <img style="height: 300px;
                                    padding: 20px;" src="{{ asset('/images/'.optional($avtr)->front) }}" alt=""></a>
                            </figure>
                            @endforeach
                            <div class="lower-content">
                                <h5><a href="{{ url('/product-details/'.$pro->slug_en.'/'.$attr->weight_en) }}"></a>
                                </h5>
                                <span class="price">{{ $attr->sale_price_en }} TK</span>
                                <span class="price">{{ $attr->weight_en }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
            @else
            <div class="row clearfix">
                @foreach ($products as $pro)
                @foreach ($pro->get_attribute as $attr)
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    @if($attr->qty_en !== 0)
                    <span class="mobile-available normal-available badge badge-success">Available</span>
                    @else
                    <span class="mobile-pre-order normal-pre-order badge badge-danger">
                        <marquee width="80%" direction="left" height="30%" scrollamount="3">
                            আপনি যদি এই পণ্যটির প্রি-অর্ডার করতে চান তবে এখানে
                            <a style="color:#fff;margin-left: 5px" href="{{ url('/contact-us') }}">ক্লিক করুন</a>.
                        </marquee>
                        <a class="badge badge-success" style="color:#fff;margin-left: 5px;" href="{{ url('/contact-us') }}">Click</a>
                    @endif
                    <div class="shop-block-one">
                        <div class="inner-box">
                            @foreach($attr->get_product_avatar as $avtr)
                            <figure class="image-box"><a
                                    href="{{ url('/product-details/'.$pro->slug_bn.'/'.$attr->weight_bn) }}">
                                    <img style="height: 300px;padding: 20px;"
                                        src="{{ asset('/images/'.optional($avtr)->front) }}" alt=""></a>
                            </figure>
                            @endforeach
                            <div class="lower-content">
                                <h5><a href="{{ url('/product-details/'.$pro->slug_bn.'/'.$attr->weight_bn) }}"></a>
                                </h5>
                                <span class="price">{{ $attr->sale_price_bn }} TK</span>
                                <span class="price">{{ $attr->weight_bn }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- contact-section -->
    <section class="contact-section sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 info-column">
                    @if (Session::get('lang') == 'english')
                    <div class="contact-info-box">
                        <div class="sec-title style-two">
                            <h2>{{ optional($cat)->cat_name_en }}</h2>
                        </div>
                        <div class="text">
                            <p>{!! htmlspecialchars_decode(optional($cat)->description_en) !!}</p>
                        </div>
                        <ul class="social-links clearfix">
                            <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i style="color: #000;" class="fab fa-google-plus-g"></i></a></li>

                        </ul>
                    </div>
                    @else
                    <div class="contact-info-box">
                        <div class="sec-title style-two">
                            <h2>{{ optional($cat)->cat_name_bn }}</h2>
                        </div>
                        <div class="text">
                            <p>{!! htmlspecialchars_decode(optional($cat)->description_bn) !!}</p>
                        </div>
                        <ul class="social-links clearfix">
                            <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i style="color: #000;" class="fab fa-google-plus-g"></i></a></li>

                        </ul>
                    </div>
                    @endif
                </div>
                {{-- <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <form method="post" action="sendemail.php" id="contact-form" class="default-form">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Your Name</label>
                                        <input type="text" name="username" placeholder="Your Name *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Your Email Address</label>
                                        <input type="email" name="email" placeholder="Your Email *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>Your Phone</label>
                                        <input type="text" name="phone" required="" placeholder="Your Phone">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>Your Subject</label>
                                        <input type="text" name="subject" required="" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Write A Message</label>
                                        <textarea name="message" placeholder="Your Message ..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn-two" type="submit" name="submit-form">send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
            </div>
        </div>
    </section>

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
</div>
@endsection
