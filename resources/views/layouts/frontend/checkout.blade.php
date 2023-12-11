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
                        <h1>Chackout</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Chackout</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- Order-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                
                    <div class="form-inner">
                        
                        <form method="post" action="{{ route('order') }}" id="contact-form" class="default-form">
                             @csrf
                            <div class="row clearfix" >
                                <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                                    <div class="sec-title style-two">
                                        <h2>Billing Details</h2>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Your Name</label>
                                            <input type="text" name="name_en" placeholder="Your Name *" value="{{ auth()->user()->name_en }}" readonly>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Your Email Address</label>
                                            <input type="email" name="email" placeholder="Your Email *" value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Your Phone</label>
                                            <input type="text" name="phn_en" required="" value="{{ auth()->user()->phn_en }}" placeholder="Your Phone">
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Your Address</label>
                                            <textarea name="address_en" placeholder="Your Address ..." required="">
                                                {{ auth()->user()->address_en }}
                                            </textarea>
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12 info-column">
                                    <div class="contact-info-box">
                                        <div class="sec-title style-two">
                                            <h2>Your Order</h2>
                                        </div>
                                        <ul>
                                            @php
                                                $subTotal = 0;
                                                $totalQty = 0;
                                            @endphp
                                            @foreach ($cart as $crt)
                                                <li style="display: inline-flex;
                                                width: 100%;
                                                
                                                margin-bottom: 5px;margin-left:0px;">
                                                    <div style="float: right;
                                                    width: 50%;
                                                    color: #000;
                                                    margin-bottom: 5px;display: inline-grid;">

                                                        <span style="color: #000;">{{ $crt->get_product->product_name_en }}</span>
                                                        
                                                    </div>
                                                    @php
                                                        $subTotal += $crt->price*$crt->qty;
                                                        $totalQty += $crt->qty

                                                    @endphp

                                                    <div style="float: right;width: 50%;color: #000;border-bottom: 5px;text-align: right;" >
                                                        <span><strong style="color: #db1818;">{{ $crt->qty }} x </strong> </span>
                                                        <span style="color: #141212;"><strong style="color: #141212;">{{ $crt->price }} </strong>TK</span>
                                                        <input type="hidden" name="product_id[]" value="{{ $crt->product_id }}">
                                                        <input type="hidden" name="product_price[]" value="{{ $crt->price }}">
                                                        <input type="hidden" name="product_quantity[]" value="{{ $crt->qty }}">
                                                    </div>
                                                </li>

                                            @endforeach
                                            <label for=""><strong style="color: #000;">SubTotal</strong></label>
                                            <div style="float: right;">
                                                <label for="">
                                                    <strong style="color: #000000;" class="badge badge-warning">{{ $subTotal }} Tk</strong>
                                                </label>
                                                <input type="hidden" name="sub_total" value="{{ $subTotal }}">
                                                <input type="hidden" name="total_quantity" value="{{ $totalQty }}">
                                            </div>
                                            <li style="display: inline-flex;
                                                width: 100%;
                                                border-bottom: 1px solid #141313;
                                                margin-bottom: 5px;margin-left:0px;">

                                                <div style="float: right;
                                                width: 50%;
                                                color: #000;
                                                margin-bottom: 5px;display: inline-grid;">

                                                    <span style="color: #000;">Shiping Cost</span>
                                                    
                                                </div>

                                                <div style="float: right;width: 50%;color: #000;border-bottom: 5px;text-align: right;" >
                                                    
                                                    <span style="color: #141212;"><strong style="color: #141212;">100 </strong>TK</span>
                                                    <input type="hidden" name="shipping_cost" value="100">
                                                    
                                                </div>

                                            </li>
                                            <label for=""><strong style="color: #000;">Total</strong></label>
                                            <div style="float: right;">
                                                <label for="">
                                                    <strong style="color: #000000;" class="badge badge-warning">{{ $subTotal+100 }} Tk</strong>
                                                </label>
                                            </div>

                                    
                                        
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn text-right">
                                            <button class="theme-btn-two" type="submit" name="submit-form">Submit Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
