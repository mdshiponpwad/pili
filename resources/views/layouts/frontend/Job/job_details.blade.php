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
                    <h1>Job Details</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Job Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img style="height: 400px !important;" src="{{ asset('/images/'.optional($category)->cover) }}" alt=""></figure>
                                <div class="lower-content">
                                    <h2>{{ optional($category)->category_name_en }}</h2>
                                    <p>{!! htmlspecialchars_decode(optional($category)->description_en) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="bg-color"></div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>Category</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($categories as $cat)
                                    <li><a href="{{ route('category.details',$cat->slug_en) }}">{{ optional($cat)->cat_name_en }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget" style="overflow-y: scroll;
                        height: 447px">
                            <div class="widget-title">
                                <h3>Recent News</h3>
                            </div>
                            <div class="post-inner">
                                @foreach ($categories as $cat)
                                @if($cat->menu_id == $category->menu_id)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ url('job-details/'.$cat->cat_name_en) }}"><img style="height: 100px !important;" src="{{ asset('/images/'.optional($cat)->cover) }}" alt=""></a></figure>
                                    <h5><a href="{{ url('job-details/'.$cat->cat_name_en) }}">{{ optional($cat)->cat_name_en }}</a></h5>
                                    {{-- <span class="post-date">27 sep 2020</span> --}}
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="advice-box centred" style="padding: 0px !important;">
                            <div class="inner">
                                @foreach ($ads->where('position','Blog Page') as $ad)
                                <figure style="padding: 20px !important;" class="image">
                                    <a href="{{ asset(optional($ad)->link) }}">
                                        <img style="height: 490px !important;" src="{{ asset('/images/'.optional($ad)->image) }}" alt="">
                                    </a>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1></h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">হোম</a></li>
                    <li>চাকরির বিস্তারিত</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img style="height: 400px !important;" src="{{ asset('/images/'.optional($category)->cover) }}" alt=""></figure>
                                <div class="lower-content">
                                    <h2>{{ optional($category)->category_name_bn }}</h2>
                                    {!! htmlspecialchars_decode(optional($category)->description_bn) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="bg-color"></div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>বিভাগ</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    @foreach ($categories as $cat)
                                    <li><a href="{{ route('category.details',$cat->slug_bn) }}">{{ optional($cat)->cat_name_bn }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget" style="overflow-y: scroll;
                        height: 447px">
                            <div class="widget-title">
                                <h3>সাম্প্রতিক খবর</h3>
                            </div>
                            <div class="post-inner">
                                @foreach ($categories as $cat)
                                @if($cat->menu_id == $category->menu_id)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ url('job-details/'.$cat->cat_name_bn) }}"><img style="height: 100px !important;" src="{{ asset('/images/'.optional($cat)->cover) }}" alt=""></a></figure>
                                    <h5><a href="{{ url('job-details/'.$cat->cat_name_bn) }}">{{ optional($cat)->cat_name_bn }}</a></h5>
                                    {{-- <span class="post-date">27 sep 2020</span> --}}
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="advice-box centred" style="padding: 0px !important;">
                            <div class="inner">
                                @foreach ($ads->where('position','Blog Page') as $ad)
                                <figure style="padding: 20px !important;" class="image">
                                    <a href="{{ asset(optional($ad)->link) }}">
                                        <img style="height: 490px !important;" src="{{ asset('/images/'.optional($ad)->image) }}" alt="">
                                    </a>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

