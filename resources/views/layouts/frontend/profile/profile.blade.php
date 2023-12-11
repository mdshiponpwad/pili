@extends('layouts.frontend.app')

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
        <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>Profile</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="shop-details border-bottom">
            <div class="auto-container">
                <div class="product-discription">
                    <div class="tabs-box">
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">Recent Orders</li>
                                <li class="tab-btn" data-tab="#tab-2">Orders</li>
                                <li class="tab-btn" data-tab="#tab-3">Account Info</li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-column">
                                        <div class="customer-comments">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                                                    <label>Product Name</label>
                                                    <input value="name" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Qty</label>
                                                    <input value="00" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Total Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Status</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-column">
                                        <div class="customer-comments">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                                                    <label>Product Name</label>
                                                    <input value="name" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Qty</label>
                                                    <input value="00" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Total Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Status</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-3">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-column">
                                        <div class="customer-comments">
                                            <form id="update" class="comment-form">
                                                <div class="row clearfix">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Name</label>
                                                        <input value="{{ auth()->user()->name_en }}" type="text" name="name" required="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Email</label>
                                                        <input value="{{ auth()->user()->email }}" type="email" name="email" required="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Phone</label>
                                                        <input value="{{ auth()->user()->phn_en }}" type="text" name="phn" required="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Password</label>
                                                        <input placeholder="password" value="" type="text" name="password" required="">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                        <label>Your address</label>
                                                        <textarea name="address">{{ auth()->user()->address_en }}</textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group message-btn">
                                                        <button type="submit" class="theme-btn-two">Submit Now</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="clients-section">
            <div class="auto-container">
                <div class="auto-container">
                    <div class="clients-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-1.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-2.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-3.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-4.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-5.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-6.png" alt=""></a></figure>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>প্রোফাইল</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li>প্রোফাইল</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="shop-details border-bottom">
            <div class="auto-container">
                <div class="product-discription">
                    <div class="tabs-box">
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">Recent Orders</li>
                                <li class="tab-btn" data-tab="#tab-2">Orders</li>
                                <li class="tab-btn" data-tab="#tab-3">Account Info</li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-column">
                                        <div class="customer-comments">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                                                    <label>Product Name</label>
                                                    <input value="name" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Qty</label>
                                                    <input value="00" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Total Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Status</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-column">
                                        <div class="customer-comments">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                                                    <label>Product Name</label>
                                                    <input value="name" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Qty</label>
                                                    <input value="00" readonly type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Total Price</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                                                    <label>Status</label>
                                                    <input value="00" readonly type="email" name="email" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab" id="tab-3">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-column">
                                        <div class="customer-comments">
                                            <form id="update" class="comment-form">
                                                <div class="row clearfix">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Name</label>
                                                        <input value="{{ auth()->user()->name_en }}" type="text" name="name" required="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Email</label>
                                                        <input value="{{ auth()->user()->email }}" type="email" name="email" required="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Phone</label>
                                                        <input value="{{ auth()->user()->phn_en }}" type="text" name="phn" required="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                        <label>Your Password</label>
                                                        <input placeholder="password" value="" type="text" name="password" required="">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                        <label>Your address</label>
                                                        <textarea name="address">{{ auth()->user()->address_en }}</textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group message-btn">
                                                        <button type="submit" class="theme-btn-two">Submit Now</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="clients-section">
            <div class="auto-container">
                <div class="auto-container">
                    <div class="clients-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-1.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-2.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-3.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-4.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-5.png" alt=""></a></figure>
                        <figure class="clients-logo-box"><a href="index.html"><img src="assets/images/clients/clients-logo-6.png" alt=""></a></figure>
                    </div>
                </div>
            </div>
        </section>
        @endif

    </div>
@section('js')
    <script>
    </script>
@endsection
@endsection





