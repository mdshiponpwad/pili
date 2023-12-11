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


<!--Page Title-->
<section class="page-title centred" style="background-image: url({{ asset('/assets/images/background/cta-1.jpg') }});">
    <div class="auto-container">
        @if (Session::get('lang') == 'english')
        <div class="content-box">
            <div class="title">
                <h1>Product Details</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Product Details</li>
            </ul>
        </div>
        @else
        <div class="content-box">
            <div class="title">
                <h1>পণ্যের বিবরণ</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">হোম</a></li>
                <li>পণ্যের বিবরণ</li>
            </ul>
        </div>
        @endif
    </div>
</section>
<!--End Page Title-->


    <!-- shop-details -->
    <section class="shop-details border-bottom">

        <div class="auto-container">
            <div class="product-details-content">
                <div class="row align-items-center clearfix" id="product">
                    @include('layouts.frontend.product.product-by-attr')
                </div>
            </div>
            <div class="product-discription">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="content-box" style="color: #000;">

                                @if (Session::get('lang') == 'english')
                                {{ $attribute->get_product->description_en }}
                                @else
                                {{ $attribute->get_product->description_bn }}
                                @endif
                                {{-- <p></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details end -->


    <!-- related-product -->
    <section class="related-product centred">
        <div class="auto-container">
            @if (Session::get('lang') == 'english')
            <div class="sec-title style-two centred">
                <p>Other Products</p>
                <h2>related product</h2>
            </div>
            <div class="row clearfix">
                @foreach ($attributes->where('product_id',$attribute->get_product->id) as $attr)
                @foreach ($attr->get_product_avatar as $avtr)
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    <div class="shop-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <a
                                    href="{{ url('/product-details/'.$attribute->get_product->slug_en.'/'.$attr->weight_en) }}">
                                    <img style="height: 300px;
                                        padding: 20px;" src="{{ asset('/images/'.$avtr->front) }}" alt="">
                                </a>
                            </figure>
                            <div class="lower-content">
                                <h5>
                                    <a
                                        href="{{ url('/product-details/'.$attribute->get_product->slug_en.'/'.$attr->weight_en) }}">
                                        {{$attr->get_product->product_name_en}}
                                    </a>
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
            <div class="sec-title style-two centred">
                <p>অন্যান্য পণ্যসমূহ</p>
                <h2>সম্পর্কিত পন্য</h2>
            </div>
            <div class="row clearfix">
                @foreach ($attributes->where('product_id',$attribute->get_product->id) as $attr)
                <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                    <div class="shop-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><a
                                    href="{{ url('/product-details/'.$attribute->get_product->slug_bn.'/'.$attr->weight_bn) }}">
                                    <img src="{{ asset('/images/'.$attr->get_product_avatar[0]->front) }}">

                            </figure>
                            <div class="lower-content">
                                <h5>
                                    <a
                                        href="{{ url('/product-details/'.$attribute->get_product->slug_bn.'/'.$attr->weight_bn) }}">
                                    </a>
                                </h5>
                                <span class="price">{{ $attr->sale_price_bn }} TK</span>
                                <span class="price">{{ $attr->weight_bn }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
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

@section('js')
<script>
    $('#zoom_01').elevateZoom();

    function getData(size,id,data){
        $.ajax({
            url: "{{ route('product.by.attr') }}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}",
                id:id,
                weight:size,
                val:data
            },
            dataType:"html",
            success: function(response) {
                $("#product").html(response);

            },
            error: function(res) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    }

    function addToCart(id){
        $.ajax({
            url: "{{ route('add.cart') }}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}",
                id:id,
                price:$("#price").text(),
                qty:$("#qty").val()
            },
            dataType:"html",
            success: function(response) {
                $("#cart").html(response);
                $("#cart1").html(response);
                Toast.fire({
                    icon:"success",
                    title:"Product Add To Cart Successfull."
                })
            },
            error: function(res) {
                if (res.status == 422) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Product already in cart!'
                    })
                }else if(res.status == 404){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops',
                        text: 'Stock!'
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'You are not logged in.!'
                    })
                }
            }
        })
    }
</script>
@endsection
@endsection
