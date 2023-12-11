@extends('layouts.frontend.app')
@section('title')
    @if(Session::get('lang') == 'english')
        {{$title->title_en}}
    @else
        {{$title->title_en}}
    @endif
@endsection
@section('meta')
   @foreach($metas as $meta)
    @if(Session::get('lang') == 'english')
        <meta name="{{$meta->meta_name_en}}" content="{{$meta->meta_des_en}}">
    @else
        <meta name="{{$meta->meta_name_bn}}" content="{{$meta->meta_des_bn}}">
    @endif
   @endforeach
@endsection
@section('content')
    <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
                @if(Session::get('lang') == 'english')
                <div class="handle-preloader">
                    <img src="{{ asset('/images/'.optional($setting)->logo) }}" alt="" />
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="" class="letters-loading">
                                Welcome to Pili Honey
                            </span>
                            
                        </div>
                    </div>
                </div>
                @else
                <div id="handle-preloader" class="handle-preloader">
                    <img src="{{ asset('/images/'.optional($setting)->logo) }}" alt="" />
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="" class="letters-loading">
                                পিলিহানিতে আপনাকে স্বাগতম
                            </span>
                            
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    <!-- Mobile Menu  -->
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
    </div><!-- End Mobile Menu -->


    <!-- banner-section -->
    <section class="banner-section style-one" style="background: none !important;">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            @foreach ($banars as $banar)

            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{ $banar ? asset('/images/' . $banar->image) : '' }})"></div>
                <div class="large-container">
                    <div class="content-inner">
                        @if (Session::get('lang') == 'english')

                        <div class="content-box">
                            <h1>{{ optional($banar->get_category)->cat_name_en }}</h1>
                            <h2>{{ optional($banar)->sub_title_en }}</h2>
                            <div class="btn-box">
                                <a href="{{ url('/category-details/'.optional($banar->get_category)->slug_bn) }}" class="theme-btn-one">learn more</a>
                                <a href="{{ url('/category-details/'.optional($banar->get_category)->slug_bn) }}" class="banner-btn-one">shop now</a>
                            </div>
                        </div>
                        @else
                        <div class="content-box">
                            <h1>{{ optional($banar->get_category)->cat_name_bn }}</h1>
                            <h2>{{ optional($banar)->sub_title_bn }}</h2>
                            <div class="btn-box">
                                <a href="{{ url('/category-details/'.optional($banar->get_category)->slug_bn) }}" class="theme-btn-one">আরও জানুন</a>
                                <a href="{{ url('/category-details/'.optional($banar->get_category)->slug_bn) }}" class="banner-btn-one">এখনই কিনুন</a>
                            </div>
                        </div>
                        @endif
                        <figure class="image"><img src="{{ $banar ? asset('/images/' . $banar->banner_image) : '' }}" alt=""></figure>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @if (Session::get('lang')=='english')
    <section class="feature-section centred">
        <div class="pattern-layer" style="background-image: url('/assets/images/shape/shape-1.png');"></div>
        <figure class="image-layer"><img src="/assets/images/resources/bee-1.png" alt=""></figure>
        <div class="auto-container">
            <div class="sec-title centred">
                <p>We Know</p>
                <h2 style="text-transform:none !important;">Your best choice</h2>
            </div>
            <div class="row clearfix">
                @foreach($categories->where('position','best_feature') as $cat)

                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                            <a href="{{ route('category.details',$cat->slug_en) }}">
                                <figure class="image-box"><img style="height: 200px;
                                    width: 100%;" src="{{ asset('/images/'.$cat->cover) }}" alt=""></figure>
                                <h3 class="best-f-h">{{ $cat->cat_name_en }}</h3>

                                {!! htmlspecialchars_decode(Str::limit($cat->description_en, 150, '...')) !!}

                            </a>
                            </div>
                            
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <section class="feature-section centred">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
        <figure class="image-layer"><img src="assets/images/resource/bee-1.png" alt=""></figure>
        <div class="auto-container">
            <div class="sec-title centred">
                <p>আমরা জানি</p>
                <h2>আপনার সেরা পছন্দ</h2>
            </div>
            <div class="row clearfix">
                @foreach($categories->where('position','best_feature') as $cat)

                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <a href="{{ route('category.details',$cat->slug_bn) }}">
                            <div class="inner-box">
                                <figure class="image-box"><img style="height: 200px;
                                    width: 70%;" src="{{ asset('/images/'.$cat->cover) }}" alt=""></figure>
                                <h3 class="best-f-h">{{ $cat->cat_name_bn }}</h3>
                                <p>
                                    {!! htmlspecialchars_decode(Str::limit($cat->description_bn, 100, '...')) !!}

                                </p>
                            </div>
                            <i class="fal fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="about-section">
        <figure class="image-layer float-bob-y"><img src="assets/images/resources/bee-2.png" alt=""></figure>
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 image-column">
                    <div class="image_block_1">
                        <div class="image-box">
                            <div class="banner-carousel mb-slide owl-theme owl-carousel owl-dots-none">
                                @foreach ($gallery as $gal)
                                <div class="slide-item">
                                    <div class="">
                                        <img class="gal-img" style="width: 100%;height:100%" src="{{asset('/images/'.optional($gal)->image)}}" alt="">
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box">
                            <figure class="year-box"><img src="assets/images/icons/year-1.png" alt=""></figure>
                            <div class="sec-title">
                                <p>About Company</p>
                                <h2 style="text-transform:none !important;">Pili comb honey is the best gift for all...!</h2>
                            </div>
                            <div class="btn-box"><a href="{{url('/category-details/honey-comb')}}" class="theme-btn-one">learn more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- shop-section -->
    @if (Session::get('lang') == 'english')
    <section class="shop-section centred">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="sec-title centred">
                <p>Visit our store</p>
                <h2 style="text-transform:none !important;">Popular product</h2>
            </div>
            <div class="row clearfix">
                @php $i = 0; @endphp
                @foreach ($categories->where('position','popular_product') as $cat)
                @php $i++; @endphp
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <a href="{{ route('category.details',$cat->slug_en) }}">
                                    <img style="height: 250px;
                                    width: 100%;
                                    padding: 20px;" src="{{ asset('/images/'.$cat->cover) }}" alt="">
                                </a>
                            </figure>
                            <div class="lower-content">
                                <h5><a href="{{ route('category.details',$cat->slug_en) }}">{{ optional($cat)->cat_name_en }}</a></h5>
                                
                                @if($i == 1)
                                <span style="color:#000;">100 gm</span>
                                @elseif($i == 2)
                                <span style="color:#000;">250 gm</span>
                                @elseif($i == 3)
                                <span style="color:#000;">500 gm</span>
                                @else 
                                <span style="color:#000;">1 kg</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="more-btn"><a href="{{ url('/all-products') }}" class="theme-btn-one">view all product</a></div>
        </div>
    </section>
    @else
    <section class="shop-section centred">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="sec-title centred">
                <p>আমাদের স্টোর দেখুন</p>
                <h2>জনপ্রিয় পণ্য</h2>
            </div>
            <div class="row clearfix">
                @php $i = 0; @endphp
                @foreach ($categories->where('position','popular_product') as $cat)
                @php $i++; @endphp
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box" style="height: 425px;">
                            <figure class="image-box">
                                <a href="{{ route('category.details',$cat->slug_bn) }}">
                                    <img style="height: 250px;
                                    width: 100%;
                                    padding: 20px;" src="{{ asset('/images/'.$cat->cover) }}" alt="">
                                </a>
                            </figure>
                            <div class="lower-content" style="padding: 20px;">
                                <h5 style="margin-bottom: 20px;"><a href="{{ route('category.details',$cat->slug_en) }}">{{ optional($cat)->cat_name_bn }}</a></h5>
                                @if($i == 1)
                                <span style="color:#000;">১০০ গ্রাম</span>
                                @elseif($i == 2)
                                <span style="color:#000;">২৫০ গ্রাম</span>
                                @elseif($i == 3)
                                <span style="color:#000;">৫০০ গ্রাম</span>
                                @else 
                                <span style="color:#000;">১ কেজি</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="more-btn"><a href="{{ url('/all-products') }}" class="theme-btn-one">আরও পণ্য দেখুন</a></div>
        </div>
    </section>
    @endif
    <!-- shop-section end -->


    <!-- chooseus-section -->
    @if (Session::get('lang') == 'english')
    <section class="chooseus-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title">
                                <p>Why you choose</p>
                                <h2 style="text-transform:none !important;">Our product</h2>
                            </div>
                            <div class="row clearfix">
                                
                                @foreach ($pages->where('position',null) as $item)
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="inner-box">
                                        <div class="single-item">
                                            <a href="{{ url('page/'.optional($item)->slug_en) }}">
                                            <div class="hb inv hb-md hb-rss-inv" style="margin-left: -100px;
                                            line-height: 14px !important;
                                            float: left;">
                                                <i class="flaticon-flower" style="font-size: 40px;color: #000;"></i>
                                            </div>
                                            <h5>{{ $item->title_en }}</h5>
                                            <p>{!! htmlspecialchars_decode(Str::limit($item->description_en, 50, '...')) !!}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        @foreach ($ads->where('position','Home Page') as $ad)
                        <figure class="image image-1">
                            <a href="{{ asset(optional($ad)->link) }}">
                                <img src="{{ asset('/images/'.optional($ad)->image) }}" alt="">
                            </a>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="chooseus-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>আপনি কেন<br />আমাদের পণ্য পছন্দ করবেন</h2>
                            </div>
                            <div class="row clearfix">
                                @foreach ($categories as $item)
                                @if ($item->position == "just_for_you")

                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="inner-box">
                                        <div class="single-item">
                                            <a href="{{ url('page/'.optional($item)->slug_en) }}">
                                            <div class="hb inv hb-md hb-rss-inv" style="margin-left: -100px;
                                            line-height: 14px !important;
                                            float: left;">
                                                <i class="flaticon-flower" style="font-size: 40px;"></i>
                                            </div>
                                            <h5>{{ $item->cat_name_bn }}</h5>
                                            <p>{{ Str::limit($item->description_bn, 100, '...') }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                {{-- <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="inner-box">
                                        <div class="single-item">
                                            <div class="hb inv hb-md hb-rss-inv" style="    margin-left: -100px;
                                            line-height: 14px !important;
                                            float: left;">
                                                <i class="flaticon-bee" style="font-size: 40px;"></i>
                                            </div>
                                            <h5>Natural Bees</h5>
                                            <p>Sed ut perspiciatis unde omnis natus volup</p>
                                        </div>
                                        <div class="single-item">
                                            <div class="hb inv hb-md hb-rss-inv" style="    margin-left: -100px;
                                            line-height: 14px !important;
                                            float: left;">
                                                <i class="flaticon-hive" style="font-size: 40px;"></i>
                                            </div>
                                            <h5>Well product</h5>
                                            <p>Sed ut perspiciatis unde omnis natus volup</p>
                                        </div>
                                        <div class="single-item">
                                            <div class="hb inv hb-md hb-rss-inv" style="    margin-left: -100px;
                                            line-height: 14px !important;
                                            float: left;">
                                                <i class="flaticon-beeswax" style="font-size: 40px;"></i>
                                            </div>
                                            <h5>increases immunity</h5>
                                            <p>Sed ut perspiciatis unde omnis natus volup</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        @foreach ($ads->where('position','Home Page') as $ad)
                        <figure class="image image-1">
                            <a href="{{ asset(optional($ad)->link) }}">
                                <img src="{{ asset('/images/'.optional($ad)->image) }}" alt="">
                            </a>
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(Session::get('lang') == 'english')
    <section class="project-section">
        <div class="outer-container">
            <div class="sec-title centred">
                <p>Please visit</p>
                <h2 style="text-transform:none !important;">Our Photo gallery</h2>
            </div>
            <div class="row clearfix">
                @foreach ($galleries as $gal)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-1">
                    <a href="{{url('/gallery-list')}}">
                        <figure class="image-box" style="height: 250px !important;width: 100% !important;text-align:center">
                            <img style="height: 250px !important;width: 100% !important" src="{{ asset('/images/'.$gal->image) }}" alt="">
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <section class="project-section">
        <div class="outer-container">
            <div class="sec-title centred">
                <p>দর্শন করুন</p>
                <h2>আমাদের ফটো গ্যালারি</h2>
            </div>
            <div class="row clearfix">
                @foreach ($galleries as $gal)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{url('/gallery-list')}}">
                        <figure class="image-box" style="height: 250px !important;width: 100% !important;text-align:center">
                            <img style="height: 250px !important;width: 100% !important" src="{{ asset('/images/'.$gal->image) }}" alt="">
                        </figure>
                    </a>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if(Session::get('lang') == 'english')
    <section class="testimonial-section" style="background-image: url(/assets/images/honeycomb.jpg);">
        <div class="auto-container">
            <div class="sec-title">
                <p>Our Achievement</p>
                <h2 style="text-transform:none !important;">Your mind blowing feedback</h2>
            </div>
            <div class="testimonial-inner">
                <div id="owl-itm" class="owl-carousel">
                    @foreach ($client as $cl)
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <div class="text">
                                        <p>
                                            <img class="arrow-img" src="assets/images/icons/arrow-1.png" alt="">
                                            {{ optional($cl)->left_description_en }}
                                        </p>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb">
                                            <img src="{{ asset('/images/'.optional($cl)->left_cover) }}" alt=""></figure>
                                        <div class="author-designation">
                                            <h4>{{ optional($cl)->left_name_en }}</h4>
                                            <span class="designation">{{ optional($cl)->left_desig_en }}</span>
                                            <span class="designation">{{ optional($cl)->left_company_en }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <div class="text">
                                        <p>
                                            <img class="arrow-img" src="assets/images/icons/arrow-1.png" alt="">
                                            {{ optional($cl)->right_des_en }}
                                        </p>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb"><img src="{{ asset('/images/'.optional($cl)->right_cover) }}" alt=""></figure>
                                        <div class="author-designation">
                                            <h4>{{ optional($cl)->right_name_en }}</h4>
                                            <span class="designation">{{ optional($cl)->right_desig_en }}</span>
                                            <span class="designation">{{ optional($cl)->right_company_en }}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row clearfix">-->
                    <!--    <div class="col-lg-3 col-md-4 col-sm-12 testimonial-block">-->
                    <!--        <div class="testimonial-block-one">-->
                    <!--            <div class="inner-box">-->
                    <!--                <div class="author-info">-->
                    <!--                    <figure class="author-thumb">-->
                    <!--                        <img style="width: 100% !important" src="{{ asset('/images/'.optional($cl)->cover) }}" alt="">-->
                    <!--                    </figure>-->
                    <!--                    <h4>{{ optional($cl)->name_en }}</h4>-->
                    <!--                    <span class="designation">{{ optional($cl)->desig_en }}</span>-->
                    <!--                    <span class="designation">{{ optional($cl)->company_en }}</span>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-7 col-md-8 col-sm-12 testimonial-block">-->
                    <!--        <div class="testimonial-block-one">-->
                    <!--            <div class="inner-box">-->
                    <!--                <div class="text">-->
                    <!--                    <img style="height: 30px;width: 40px !important;" src="assets/images/icons/arrow-1.png" alt="">-->
                    <!--                    <p>{!! htmlspecialchars_decode(optional($cl)->description_en) !!}</p>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->

    <!-- cta-section -->
    <section class="cta-section centred" style="background-image: url(assets/images/background/cta-1.jpg);">
        <div class="auto-container">
            <div class="inner-box">
                <p>We make design for</p>
                <h2 style="text-transform:none !important;">Your company and clients <br/> friends and relatives</h2>
                <a href="{{ url('/contact-us') }}" class="theme-btn-one">contact us</a>
            </div>
        </div>
    </section>
    <!-- cta-section end -->


    <!-- news-section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="{{ url('blog-details/'.$blog->title_en) }}"><img style="height: 270px !important" src="{{ asset('/images/'.optional($blog)->image) }}" alt=""></a></figure>
                                <div class="lower-content">
                                    <h5><a href="{{ url('blog-details/'.$blog->title_en) }}">{{ optional($blog)->title_en }}</a></h5>
                                    <div class="link"><a href="{{ url('blog-details/'.$blog->title_en) }}">Read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->


    <!-- clients-section -->
    <section class="clients-section">
        <div class="sec-title centred">
            <h2 style="text-transform:none !important;">Our satisfied clients</h2>
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
    <section class="testimonial-section" style="background-image: url(/assets/images/honeycomb.jpg);">
        <div class="auto-container">
            <div class="sec-title">
                <p>আমাদের অর্জন</p>
                <h2>ব্যবহারকারীর মতামত</h2>
            </div>
            <div class="testimonial-inner">
                <div class="single-item-carousel owl-carousel owl-theme">
                    @foreach ($client as $cl)
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <div class="text">
                                        <p>
                                            <img class="arrow-img" src="assets/images/icons/arrow-1.png" alt="">
                                            {{ optional($cl)->left_description_bn }}
                                        </p>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb">
                                            <img src="{{ asset('/images/'.optional($cl)->left_cover) }}" alt=""></figure>
                                        <div class="author-designation">
                                            <h4>{{ optional($cl)->left_name_bn }}</h4>
                                            <span class="designation">{{ optional($cl)->left_desig_bn }}</span>
                                            <span class="designation">{{ optional($cl)->left_company_bn }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <div class="text">
                                        <p>
                                            <img class="arrow-img" src="assets/images/icons/arrow-1.png" alt="">
                                            {{ optional($cl)->right_des_bn }}
                                        </p>
                                    </div>
                                    <div class="author-info">
                                        <figure class="author-thumb"><img src="{{ asset('/images/'.optional($cl)->right_cover) }}" alt=""></figure>
                                        <div class="author-designation">
                                            <h4>{{ optional($cl)->right_name_bn }}</h4>
                                            <span class="designation">{{ optional($cl)->right_desig_bn }}</span>
                                            <span class="designation">{{ optional($cl)->right_company_bn }}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row clearfix">-->
                    <!--    <div class="col-lg-3 col-md-4 col-sm-12 testimonial-block">-->
                    <!--        <div class="testimonial-block-one">-->
                    <!--            <div class="inner-box">-->
                    <!--                <div class="author-info">-->
                    <!--                    <figure class="author-thumb">-->
                    <!--                        <img style="width: 100% !important" src="{{ asset('/images/'.optional($cl)->cover) }}" alt="">-->
                    <!--                    </figure>-->
                    <!--                    <h4>{{ optional($cl)->name_bn }}</h4>-->
                    <!--                    <span class="designation">{{ optional($cl)->desig_bn }}</span>-->
                    <!--                    <span class="designation">{{ optional($cl)->company_bn }}</span>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-7 col-md-8 col-sm-12 testimonial-block">-->
                    <!--        <div class="testimonial-block-one">-->
                    <!--            <div class="inner-box">-->
                    <!--                <div class="text">-->
                    <!--                    <img style="height: 30px;width: 40px !important;" src="assets/images/icons/arrow-1.png" alt="">-->
                    <!--                    <p>{!! htmlspecialchars_decode(optional($cl)->description_bn) !!}</p>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->

    <section class="cta-section centred" style="background-image: url(assets/images/background/cta-1.jpg);">
        <div class="auto-container">
            <div class="inner-box">
                <p>আমরা নকশা তৈরি করি</p>                
                <h2>আপনার সংস্থা, ক্লায়েন্ট, বন্ধুবান্ধব, আত্মীয়দের জন্য</h2>
                <a href="{{ url('/contact-us') }}" class="theme-btn-one">
                    যোগাযোগ করুন</a>
            </div>
        </div>
    </section>

    <!-- news-section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="{{ url('blog-details/'.$blog->title_bn) }}"><img style="height: 270px !important" src="{{ asset('/images/'.optional($blog)->image) }}" alt=""></a></figure>
                                <div class="lower-content">
                                    <h5><a href="{{ url('blog-details/'.$blog->title_bn) }}">{{ optional($blog)->title_bn }}</a></h5>
                                    <div class="link"><a href="{{ url('blog-details/'.$blog->title_bn) }}">আরও পডুন</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->


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
@endsection


