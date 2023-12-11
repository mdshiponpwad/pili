<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<titl
    @yield('title')
    <!--@if(Session::get('lang') == 'english')-->
    <!--Pili-Honey-->
    <!--@else-->
    <!--পিলি-মধু-->
    <!--@endif-->
</title>
@yield('meta')
<!-- Fav Icon -->
<link rel="icon" href="/assets/images/logo.gif" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="/assets/css/font-awesome-all.css" rel="stylesheet">
<link href="/assets/css/flaticon.css" rel="stylesheet">
<!--<link href="/assets/css/owl.css" rel="stylesheet">-->
<link href="/assets/css/bootstrap.css" rel="stylesheet">
<link href="/assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="/assets/css/animate.css" rel="stylesheet">
<link href="/assets/css/color.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<link href="/assets/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/hexagons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.carousel.min.css" integrity="sha512-zZeaOGBINpZ40sf0vSXDHurC4euMISvK+qExhddoPrNuibf6aG9YmcrmPblFaaoas8MtbNjX5YOJft5DOoTRPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .dropbtn {
      /* background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none; */
    }

    .feature-block-one .inner-box h1,h2,h3,h4,h5,h6{
        font-size: 15px;
    }
    .feature-block-one .inner-box ul{
        display: none;
    }

    .best-f-h{
        font-size: 24px;
    }
    .author-info{
        text-align: center;
        width: 100%;
    }
 

    .slide-item{
        padding: 450px 0px 340px 0px !important;
    }

    .fa.fa-phone{
        color: #000;
        margin-right: 12px;
        border-radius: 20px;
        background: #fff;
        height: 40px;
        width: 40px;
        text-align: center;
        line-height: 2.8;
        font-weight: 700;
    }

    .fab.fa-facebook-f{
        background: blue;
        color: #fff;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 1.8;
        border-radius: 20px;
        transition: 1s;
    }

    .fab.fa-youtube{
        background: red;
        color: #fff;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 1.8;
        border-radius: 20px;
        transition: 1s;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      min-width: 300px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {font-weight:700;}
    .normal_cat{
        height: 0px;
        margin-left: 8px;
    }
    
    .normal-pre-order{
        font-size: 15px;
        position: absolute;
        z-index: 9999;LEFT: 16px;right: 16px;
    }
    
    .normal-available{
        font-size: 20px;
        position: absolute;
        z-index: 9999;
        LEFT: 16px;
    }
    .handle-preloader img{
        width: 100px;
        margin-top:-110px;
    }
    .banner-section{
        max-height: 800px !important;
    }
    .image-layer{
        height: 270px !important;    
    }
    
    .banner-carousel .image {
        bottom: 175px;
        right: -420px;
    }
    
    .owl-carousel .owl-item img {
        width: 50% !important;
    }
    .banner-carousel .content-box {
        max-width: 660px !important;
        top: -250px !important;
    }
    
    .feature-section .image-layer {
        left: 35px !important;
        top: -200px !important;
    }
    
    .owl-carousel .owl-item .gal-img {
        width: 100% !important;
        height:38rem !important;
    }
    
    .footer-top .contact-widget {
        width: 100%;
    }
    
    .content_block_1 .content-box .year-box {
        margin-bottom: 5px;
    }
    
    .hb-rss-inv, .hb-rss-inv:after, .hb-rss-inv:before, .hb-rss:hover, .hb-rss:hover:after, .hb-rss:hover:before {
        background: #fff !important;
        border-color: #fff !important;
        color: #fff !important;
    }
    
    .banner-carousel .content-box h1 {
        color:#a56301 !important;
        font-size: 90px !important;
        margin-bottom: -95px !important;
        line-height: 340px !important;
    }
    .banner-carousel .content-box h2 {
        color:#732100 !important;
    }
    .owl-nav{
        display: none !important;
    }
    .megamenu{
        opacity: 90% !important;
    }
    .author-thumb{
        width: 20% !important;
    }
    .testimonial-block-one .inner-box .author-info .author-thumb img {
        width: 100% !important;
        border-radius: 50px;
        height: 78%;
    }
    .author-info{
        display: inline-flex;
    }
    .author-designation{
        margin-top: 5%;
    }
    .testimonial-block-one .inner-box .text img {
        position: relative;
        display: inline-block;
        margin-right: 20px;
        width: 10% !important;
    }
    .testimonial-block-one .inner-box .text {
        margin-bottom: 0px !important;
        width: 95% !important;
    }
    .testimonial-section .sec-title {
        margin-bottom: 30px !important;
    }
    
    @media (min-width: 268px) and (max-width: 768px){
        .mobile-pre-order {
            font-size: 11px !important;
            position: absolute;
            z-index: 9999;
            LEFT: 68px !important;
            right: 16px;
            width: 65.7% !important;
        }
        
        .inner-box .author-info h4 {
            font-size: 15px !important;
            line-height: 20px !important;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 0px !important;
        }
        .testimonial-block-one .inner-box .author-info .author-thumb img {
            width: 100% !important;
            border-radius: 50px;
            height: 70px !important;
        }
        .testimonial-block-one .inner-box .text p {
            display: inline-block;
            font-size: 15px !important;
            line-height: 20px !important;
            text-align: justify !important;
        }
        .testimonial-block-one{
            margin-bottom: -75px !important;
        }
        .testimonial-block-one .inner-box .text {
            margin-bottom: 0px !important;
            width: 100% !important;
        }
        .banner-carousel .content-box h1 {
            color: #a56301 !important;
            font-size: 40px !important;
            margin-bottom: -95px !important;
            line-height: 240px !important;
        }
        .banner-carousel .content-box h2 {
            font-size: 25px;
            line-height: 20px;
        }
        .image-layer {
            height: 134px !important;
        }
        .banner-carousel .content-box {
            max-width: 100% !important;
            top: -400px !important;
        }
        .banner-section {
            max-height: 315px !important;
        }
        .mb-slide .slide-item{
            padding: 0px !important;
        }
        .year-box img{
            height: 80px !important;
        }
        .image_block_1 .image-box {
            margin: 0px 0px 30px 0px;
            width: 100%;
            height: 340px !important;
            line-height: 100%;
        }
        .about-section .image-layer {
            position: absolute;
            top: 0px;
            right: 15px !important;
            display: block;
        }
        .float-bob-y img{
            height: 80px;
        }
        .testimonial-block-one .inner-box .text p{
          display: inline-block;
          font-size: 18px;
          line-height: 25px;
          text-align: left;
        }
        .testimonial-block-one .inner-box .text{
          margin-bottom: 33px;
          width:400px;
        }
        .content_block_1 .content-box {
            position: relative;
            display: block;
            text-align: center;
        }
        .content_block_1 .content-box .year-box {
            margin-bottom: 5px;
        }
        .footer-top .contact-widget {
            width: 100%;
        }
        .owl-carousel .owl-item img {
            width: 50% !important;
        }
        .handle-preloader img{
            width: 80px;
            margin-top:-115px;
        }
        #handle-preloader img{
            width: 80px;
            margin-top:-185px;
        }
        .letters-loading{
            font-size:14px;
            text-transform: none !important;
            letter-spacing: 0px !important;
        }
        .mobile_cat{
            margin-left: 30px;
            color: #fff;
            font-weight: 700;
        }
        .megamenu{
            margin-top: 30px;
        }
        .mobile-menu .navigation li {
            border-top: none;
        }
        
        .mobile-pre-order{
            font-size: 15px;
            position: absolute;
            z-index: 9999;
            LEFT: 173px;
            right: 16px;
            width: 46%;
        }
        
        .mobile-available {
            font-size: 15px;
            position: absolute;
            z-index: 9999;
            LEFT: 50px !important;
        }
        
    }
    </style>
</head>
<body>

    <div class="boxed_wrapper" style="background-image: url(/assets/images/honeycomb.jpg);">

        <!-- preloader -->
        
        <!-- preloader end -->


        <!-- sidebar cart item -->
        <div class="xs-sidebar-group info-group info-sidebar">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="index.html" class="close-side-widget">X</a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            @if(Session::get('lang') == 'english')
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img style="width: 50px;" src="{{ asset('/images/'.optional($setting)->logo) }}" alt="" /></a>
                                </div>
                                <div class="content-box">
                                    <h4>For Us</h4>
                                    <p>your comments or advice very much important for us.</p>
                                </div>
                                <div class="form-inner">
                                    <h4>Your Advice</h4>
                                    <form method="post" action="{{ url('contact-us-create') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name_en" placeholder="Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="msg_en" placeholder="Message..."></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn-one">Submit Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img style="width: 50px;" src="{{ asset('/images/'.optional($setting)->logo) }}" alt="" /></a>
                                </div>
                                <div class="content-box">
                                    <h4>আমাদের সম্পর্কে</h4>
                                    <p>আপনার মন্তব্য বা পরামর্শ আমাদের জন্য খুব গুরুত্বপূর্ণ।</p>
                                </div>
                                <div class="form-inner">
                                    <h4>আপনার উপদেশ</h4>
                                    <form method="post" action="{{ url('contact-us-create') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name_bn" placeholder="নাম লিখুন" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="msg_bn" placeholder="বার্তা লিখুন..."></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn-one">বার্তা পাঠান</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->


        <!-- main header -->
        <header class="main-header style-one">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><a href="{{ route('home') }}"><img style="width: 50px;" src="{{ asset('/images/'.optional($setting)->logo) }}" alt=""></a></figure>
                    </div>
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    @if (Session::get('lang')=='english')
                                    @foreach ($menus as $menu)
                                    <li class="dropdown"><a href="{{ $menu->link }}">{{ $menu->menu_en }}</a>
                                        @if ($menu->menu_en == "Products")
                                        <div class="megamenu">
                                            <div class="row clearfix">
                                                @foreach ($menu->get_category_en as $cat)
                                                <div class="col-lg-3 column">
                                                    <ul>
                                                        <li style="display: inline-flex;margin-bottom: 20px;">
                                                            <a href="{{ route('category.details',$cat->slug_en) }}" style="height: 110px;
                                                            width: 71px;
                                                            margin-top: -35px;
                                                            border-bottom: none;margin-left: 0px;">
                                                                <span class="hb inv hb-md hb-rss-inv">
                                                                    <img style="height: 70%;
                                                                    width: 70%;
                                                                    margin-top: -25px;" src="{{ asset('/images/'.$cat->cover) }}" alt="">
                                                                </span>
                                                              </a>
                                                            <h4 class="mobile_cat normal_cat">{{ optional($cat)->cat_name_en }}</h4>
                                                        </li>
                                                        {{-- @foreach ($attributes as $attr)
                                                        @if($attr->get_product_en->category_en_id == $cat->id)
                                                        <li>
                                                            <a href="#">
                                                                <label for="">Weight</label>
                                                                <span>{{ $attr->weight_en }}</span>
                                                                <div style="float: right;">
                                                                    <label for="">
                                                                        Price
                                                                    </label>
                                                                    <span>{{ $attr->sale_price_en }} tk</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        @endif
                                                        @endforeach --}}
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @if($menu->menu_en == "Language")
                                        <ul>
                                            <li>
                                                <a href="{{ route('bangla') }}">bangla</a>

                                            </li>
                                            <li>
                                                <a href="{{ route('english') }}">english</a>
                                            </li>
                                            @foreach ($menu->get_category_en as $cat)
                                            <li>
                                                <a href="#">{{ $cat->cat_name_en }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @if($menu->menu_en == "Job")
                                        <ul>
                                            @foreach ($menu->get_category_en as $cat)
                                            <li>
                                                <a href="{{ url('job-details/'.$cat->slug_en) }}">{{ $cat->cat_name_en }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>

                                    @endforeach
                                    @else
                                    @foreach ($menus as $menu)
                                    <li class="dropdown"><a href="{{ $menu->link }}">{{ $menu->menu_bn }}</a>
                                        @if ($menu->menu_bn == "পণ্য")
                                        <div class="megamenu">
                                            <div class="row clearfix">
                                                @foreach ($menu->get_category_bn as $cat)
                                                <div class="col-lg-3 column">
                                                    <ul>
                                                        <li style="display: inline-flex;margin-bottom: 20px;">
                                                            <a href="{{ route('category.details',$cat->slug_bn) }}" style="height: 110px;
                                                            width: 71px;
                                                            margin-top: -35px;
                                                            border-bottom: none;margin-left: 0px;">
                                                                <span class="hb inv hb-md hb-rss-inv">
                                                                    <img style="height: 70%;
                                                                    width: 70%;
                                                                    margin-top: -25px;" src="{{ asset('/images/'.$cat->cover) }}" alt="">
                                                                </span>
                                                              </a>
                                                            <h4 class="mobile_cat normal_cat">{{ optional($cat)->cat_name_bn }}</h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        @if($menu->menu_bn == "ভাষা")
                                        <ul>
                                            <li>
                                                <a href="{{ route('bangla') }}">bangla</a>

                                            </li>
                                            <li>
                                                <a href="{{ route('english') }}">english</a>
                                            </li>

                                        </ul>
                                        @endif
                                        @if($menu->menu_bn == "চাকরি")
                                        <ul>
                                            @foreach ($menu->get_category_bn as $cat)
                                            <li>
                                                <a href="{{ url('job-details/'.$cat->slug_bn) }}">{{ $cat->cat_name_bn }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>

                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </nav>
                        <ul class="menu-right-content clearfix">
                            {{-- <li class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                                    <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                        <div class="form-container">
                                            <form method="post" action="blog.html">
                                                <div class="form-group">
                                                    <input type="search" name="search-field" value="" placeholder="Search...." required="">
                                                    <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <div class="dropdown">
                                <i class="far fa-user" style="color: #fff;"></i>
                                @auth
                                    <div class="dropdown-content" style="min-width: 200px; !important;left: -130px;">
                                        <a href="{{ url('/admin/dashboard') }}"><i style="margin-right: 10px;" class="far fa-user"></i>Admin Dashboard</a>
                                        <a href="{{ route('home.user.profile') }}"><i style="margin-right: 10px;" class="far fa-user"></i>Profile</a>
                                        <a href="{{route('user.logout')}}"><i style="margin-right: 10px;" class="far fa-sign-out"></i>Logout</a>
                                    </div>
                                @endauth
                                @guest
                                    <div class="dropdown-content" style="min-width: 200px; !important;left: -130px;">
                                        <a href="{{ route('home.user.login') }}"><i style="margin-right: 10px;" class="far fa-sign-in"></i>Login</a>
                                        <a href="{{ route('home.user.login') }}"><i style="margin-right: 10px;" class="fas fa-registered"></i>Register</a>
                                    </div>
                                @endguest
                            </div>
                            <li class="cart-btn dropdown">
                             @if (auth()->user() != null)                          
                                <a class="dropbtn" href="{{ route('proceedCheckout') }}"><i class="far fa-cart-plus"></i><span>{{ $count1 }}</span></a>
                            @else
                               <a class="dropbtn" href="#"><i class="far fa-cart-plus"></i><span>{{ $count1 }}</span></a>                        
                            @endif

                                                   
                            <div id="cart" class="dropdown-content" style="max-width:300px !important;left:-230px;">

                                @include('layouts.frontend.cart.headerCartPortion')
                            </div>
                        
                                
                            </li>
                            {{-- <li class="like-btn"><a href="#"><i class="far fa-heart"></i></a></li> --}}
                            <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                        </ul>

                    </div>
                    <div class="nav-right-content">
                        <i class="fa fa-phone"></i>
                        @if (Session::get('lang') == 'english')
                        <div style="display: inline-grid;">
                            <small style="color: #fff">{{ optional($setting)->contact_en }}</small>
                            <small style="color: #fff;
                            margin-top: -10px;">Sat-Thu: 10:00am - 8:00pm</small>
                        </div>
                        @else
                        <div style="display: inline-grid;">
                            <small style="color: #fff">{{ optional($setting)->contact_bn }}</small>
                            <small style="color: #fff;
                            margin-top: -10px;">শনি-বৃহ: ১০:00 টা - ৮:00 টা</small>
                        </div>
                        @endif

                        {{-- <ul class="social-links clearfix">
                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul> --}}
                        <div class="nav-box">
                            <button class="nav-toggler navSidebar-button clearfix">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><a href="{{ route('home') }}"><img style="width: 50px;" src="{{ asset('/images/'.optional($setting)->logo) }}" alt=""></a></figure>
                    </div>
                    <div class="menu-area">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                        <ul class="menu-right-content clearfix">
                            {{-- <li class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                                    <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                        <div class="form-container">
                                            <form method="post" action="blog.html">
                                                <div class="form-group">
                                                    <input type="search" name="search-field" value="" placeholder="Search...." required="">
                                                    <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="cart-btn dropdown">
                                <a href="#"><i class="far fa-cart-plus"></i><span>{{ $count1 }}</span></a>
                                <div id="cart1" class="dropdown-content" style="max-width:300px !important;left:-230px;">
                                    @include('layouts.frontend.cart.headerCartPortion')
                                </div>
                            </li>
                            {{-- <li class="like-btn"><a href="#"><i class="far fa-heart"></i></a></li> --}}
                            <div class="dropdown">
                                <i class="far fa-user" style="color: #fff;"></i>
                                @auth
                                    <div class="dropdown-content" style="min-width: 200px; !important;left: -130px;">
                                        <a href="{{ route('home.user.profile') }}"><i style="margin-right: 10px;" class="far fa-user"></i>Profile</a>
                                        <a href="{{route('user.logout')}}"><i style="margin-right: 10px;" class="far fa-sign-out"></i>Logout</a>
                                    </div>
                                @endauth
                                @guest
                                    <div class="dropdown-content" style="min-width: 200px; !important;left: -130px;">
                                        <a href="{{ route('home.user.login') }}"><i style="margin-right: 10px;" class="far fa-sign-in"></i>Login</a>
                                        <a href="{{ route('home.user.login') }}"><i style="margin-right: 10px;" class="fas fa-registered"></i>Register</a>
                                    </div>
                                @endguest
                            </div>
                            <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ optional($setting)->tube_link }}"><i style="background: #fff !important;color: red !important;" class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="nav-right-content">
                        <i class="fa fa-phone"></i>
                        @if (Session::get('lang') == 'english')
                        <div style="display: inline-grid;">
                            <small style="color: #fff">{{ optional($setting)->contact_en }}</small>
                            <small style="color: #fff;
                            margin-top: -10px;">Sat-Thu: 10:00am - 8:00pm</small>
                        </div>
                        @else
                        <div style="display: inline-grid;">
                            <small style="color: #fff">{{ optional($setting)->contact_bn }}</small>
                            <small style="color: #fff;
                            margin-top: -10px;">শনি-বৃহ: ১০:00 টা - ৮:00 টা</small>
                        </div>
                        @endif
                        {{-- <ul class="social-links clearfix">
                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul> --}}
                        <div class="nav-box">
                            <button class="nav-toggler navSidebar-button clearfix">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->
