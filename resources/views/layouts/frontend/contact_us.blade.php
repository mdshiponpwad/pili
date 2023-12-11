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
    <div class="boxed_wrapper">

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
        <section class="page-title centred" style="background-image: url('/assets/images/background/cta-1.jpg');">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>Conatct Us</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Conatct Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 info-column">
                        <div class="contact-info-box">
                            <div class="sec-title style-two">
                                <h2>Contact Us</h2>
                            </div>
                            <ul class="info-list clearfix">
                                <li><i class="far fa-map-marker-alt"></i>{{ optional($setting)->address_en }}</li>
                                <li><i class="far fa-phone"></i><a href="tel:0123456789">{{ optional($setting)->contact_en }}</a></li>
                                <li><i class="far fa-envelope-open"></i><a href="mailto:support@gmail.com">{{ optional($setting)->email }}</a></li>
                            </ul>
                            <ul class="social-links clearfix">
                                <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <form method="post" action="{{ url('contact-us-create') }}" id="contact-form" class="default-form">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Your Name</label>
                                        <input type="text" name="name_en" placeholder="Your Name *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Your Email Address</label>
                                        <input type="email" name="email" placeholder="Your Email *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>Your Phone</label>
                                        <input type="text" name="phn_en" required="" placeholder="Your Phone">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>Your Subject</label>
                                        <input type="text" name="subject_en" required="" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label><i style="color: #000;
                                            margin-right: 10px;" class="fa fa-star"></i>If you want,you can skip this part.</label>
                                    </div>
                                    <div style="background-color: #ddd;margin-left: 15px;width:100%;display:inline-flex">
                                        <div class="col-lg-4 col-md-6 col-sm-4 form-group">
                                            <label>Select Category</label>
                                            <input onclick="getData()" id="cat_name" type="text" name="cat_name" required="" placeholder="Subject">
                                            <div style="z-index: 9999;">
                                                <ul id="dropdown_cat" style="background-color: #ddd;
                                                padding: 10px;display:none;
                                                width: 292px;">
                                                    @foreach ($categories as $cat)
                                                    <li style="border-bottom: 1px solid #fff;">{{ $cat->cat_name_en }}</li>

                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4 form-group">
                                            <label>Select Weight</label>
                                            <input onclick="getData_weight()" type="text" id="weight" name="weight" required="" placeholder="weight">
                                            <div style="z-index: 9999;">
                                                <ul id="dropdown_weight" style="background-color: #ddd;
                                                padding: 10px;display:none;
                                                width: 292px;">
                                                    <li style="border-bottom: 1px solid #fff;">100mg</li>
                                                    <li style="border-bottom: 1px solid #fff;">250mg</li>
                                                    <li style="border-bottom: 1px solid #fff;">500mg</li>
                                                    <li>1000mg</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-4 form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="qty" required="" placeholder="qty">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Write A Message</label>
                                        <textarea name="msg_en" placeholder="Your Message ..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn-two" type="submit" name="submit-form">send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- google-map-section -->
        <section class="google-map-section">
            <div class="map-inner">
                <div
                    class="google-map"
                    id="contact-google-map"
                    data-map-lat="40.712776"
                    data-map-lng="-74.005974"
                    data-icon-path="assets/images/icons/map-marker.png"
                    data-map-title="Brooklyn, New York, United Kingdom"
                    data-map-zoom="12"
                    data-markers='{
                        "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                    }'>

                </div>
            </div>
        </section>
        <!-- google-map-section end -->
        @else
        <!--Page Title-->
        <section class="page-title centred" style="background-image: url('/assets/images/background/cta-1.jpg');">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>যোগাযোগ করুন</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li>যোগাযোগ করুন</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 info-column">
                        <div class="contact-info-box">
                            <div class="sec-title style-two">
                                <h2>যোগাযোগ করুন</h2>
                            </div>
                            <ul class="info-list clearfix">
                                <li><i class="far fa-map-marker-alt"></i>{{ optional($setting)->address_bn }}</li>
                                <li><i class="far fa-phone"></i><a href="tel:0123456789">{{ optional($setting)->contact_bn }}</a></li>
                                <li><i class="far fa-envelope-open"></i><a href="mailto:support@gmail.com">{{ optional($setting)->email }}</a></li>
                            </ul>
                            <ul class="social-links clearfix">
                                <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <form method="post" action="{{ url('contact-us-create') }}" class="default-form">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>আপনার নাম</label>
                                        <input type="text" name="name_bn" placeholder="নাম লিখুন *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>ইমেল অ্যাড্রেস</label>
                                        <input type="email" name="email" placeholder="আপনার ইমেল *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>আপনার ফোন</label>
                                        <input type="text" name="phn_bn" required="" placeholder="আপনার ফোন">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>আপনার বিষয়</label>
                                        <input type="text" name="subject_bn" required="" placeholder="বিষয়">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label><i style="color: #000;
                                            margin-right: 10px;" class="fa fa-star"></i>আপনি চাইলে আপনি এই অংশটি এড়িয়ে যেতে পারেন।</label>
                                    </div>
                                    <div style="background-color: #ddd;margin-left: 15px;width:100%;display:inline-flex">
                                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                            <label>Select Category</label>
                                            <input onclick="getData()" id="cat_name" type="text" name="cat_name" required="" placeholder="Subject">
                                            <div style="z-index: 9999;">
                                                <ul id="dropdown_cat" style="background-color: #ddd;
                                                padding: 10px;display:none;
                                                width: 292px;">
                                                    @foreach ($categories as $cat)
                                                    <li style="border-bottom: 1px solid #fff;">{{ $cat->cat_name_en }}</li>

                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                            <label>Select Weight</label>
                                            <input onclick="getData_weight()" type="text" id="weight" name="weight" required="" placeholder="weight">
                                            <div style="z-index: 9999;">
                                                <ul id="dropdown_weight" style="background-color: #ddd;
                                                padding: 10px;display:none;
                                                width: 292px;">
                                                    <li style="border-bottom: 1px solid #fff;">100mg</li>
                                                    <li style="border-bottom: 1px solid #fff;">250mg</li>
                                                    <li style="border-bottom: 1px solid #fff;">500mg</li>
                                                    <li>1000mg</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="qty" required="" placeholder="qty">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>একটা বার্তা লিখুন</label>
                                        <textarea name="msg_bn" placeholder="বার্তা লিখুন"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn-two" type="submit" name="submit-form">
                                            বার্তা পাঠান</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- google-map-section -->
        <section class="google-map-section">
            <div class="map-inner">
                <div
                    class="google-map"
                    id="contact-google-map"
                    data-map-lat="40.712776"
                    data-map-lng="-74.005974"
                    data-icon-path="assets/images/icons/map-marker.png"
                    data-map-title="Brooklyn, New York, United Kingdom"
                    data-map-zoom="12"
                    data-markers='{
                        "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                    }'>

                </div>
            </div>
        </section>
        <!-- google-map-section end -->
        @endif

@section('js')
    <script>
        function getData(){
            $("#dropdown_cat").show();
            $("#dropdown_cat").on('click', 'li', function(){
                $('#cat_name').val($(this).text());
                $("#dropdown_cat").fadeOut();
            });
        }

        function getData_weight(){
            $("#dropdown_weight").show();
            $("#dropdown_weight").on('click', 'li', function(){
                $('#weight').val($(this).text());
                $("#dropdown_weight").fadeOut();
            });
        }

    </script>
@endsection
@endsection
