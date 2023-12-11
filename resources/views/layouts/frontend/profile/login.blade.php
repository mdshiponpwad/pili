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
        <section class="page-title centred" style="background-image: url(/assets/images/background/cta-1.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>Login Or Register</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Login Or Register</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    @guest
                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <form id="contact-form" class="default-form">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Your Email Address</label>
                                            <input type="email" name="email" placeholder="Your Email *" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Your Password</label>
                                            <input type="text" name="password" required="" placeholder="password">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-two" type="submit" name="submit-form">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <form id="register" class="default-form">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>Your Name</label>
                                            <input type="text" name="name" placeholder="Your Name *" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>Your Email Address</label>
                                            <input type="email" name="email" placeholder="Your Email *" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>Your Phone</label>
                                            <input type="text" name="phn" required="" placeholder="Your Phone">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>Your Password</label>
                                            <input type="text" name="password" required="" placeholder="password">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Address</label>
                                            <textarea name="address" placeholder="Your address ..."></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-two" type="submit" name="submit-form">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endguest
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
        @else
        <!--Page Title-->
        <section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>সাইন ইন করুন অথবা নিবন্ধন করুন</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li>সাইন ইন করুন অথবা নিবন্ধন করুন</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    @guest
                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <form id="contact-form" class="default-form">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>আপনার ইমেইল ঠিকানা</label>
                                            <input type="email" name="email" placeholder="আপনার ইমেইল *" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>আপনার পাসওয়ার্ড</label>
                                            <input type="text" name="password" required="" placeholder="পাসওয়ার্ড">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-two" type="submit" name="submit-form">প্রবেশ করুন</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <form id="register" class="default-form">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>আপনাম নাম</label>
                                            <input type="text" name="name_bn" placeholder="আপনার নাম *" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>আপনার ইমেইল ঠিকানা</label>
                                            <input type="email" name="email" placeholder="ইমেইল ঠিকানা *" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>আপনার ফোন</label>
                                            <input type="text" name="phn_bn" required="" placeholder="আপনার ফোন">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>আপনার ফোন</label>
                                            <input type="text" name="password_bn" required="" placeholder="পাসওয়ার্ড">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>ঠিকানা</label>
                                            <textarea name="address_bn" placeholder="ইমেইল ঠিকানা"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-two" type="submit" name="submit-form">
                                                নিবন্ধন</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endguest
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
        @endif
    </div>
@section('js')
    <script>
        $("#contact-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('user.login') }}",
                method: "POST",
                data: new FormData(document.getElementById("contact-form")),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in successfully'
                    })
                    window.location.href ='/';

                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            })
        })

        $("#register").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('store') }}",
            method: "POST",
            data: new FormData(document.getElementById("register")),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                window.location.href ='/';
                Toast.fire({
                    icon: 'success',
                    title: 'Registration successfull.'
                })

            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    })
    </script>
@endsection
@endsection
