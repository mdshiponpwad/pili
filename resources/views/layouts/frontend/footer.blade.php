        <!-- main-footer -->
        <footer class="main-footer" style="background-color: #ab8a00 !important;
        opacity: .8 !important;">
            {{-- <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-3.png);"></div> --}}
            {{-- <div class="image-layer">
                <figure class="image image-1"><img src="assets/images/resource/honey-1.png" alt=""></figure>
                <figure class="image image-2"><img src="assets/images/resource/honey-2.png" alt=""></figure>
            </div> --}}
            <div class="auto-container">
                <div class="footer-top" style="padding-top: 30px !important;padding-bottom: 0px !important;">
                    @if (Session::get('lang') == 'english')
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="widget-content">
                                    <h6 style="margin-bottom: 0px !important;">Address:</h6>
                                    <span><i class="fas fa-map-marker-alt"></i>{{optional($setting)->address_en}}</span>
                                    <h6 style="margin-bottom: 0px !important;">Mobile:</h6>
                                    <span>{{ optional($setting)->contact_en }}</span>
                                    <h6 style="margin-bottom: 0px !important;">Email:</h6>
                                    <i class="fa fa-envelope"></i><p style="top: -30px;margin-left: 20px;color:#fff !important;">{{ optional($setting)->email }}</p>
                                    {{-- <h6 style="margin-bottom: 0px !important;top: -34px;">Working Days/Hours:</h6> --}}
                                    <p style="top: -34px;color:#fff !important;margin-bottom: -20px !important;"><i style="margin-right: 5px;" class="far fa-clock"></i>Sat - Thu: 10:00 AM - 8:00 PM</p>
                                    {{-- <ul class="social-links clearfix">
                                        <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul> --}}
                                    {{-- <div class="call-box"><p><i class="fal fa-phone"></i><a href="tel:0123456789">+012 0000000</a></p></div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>At A Glance</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        
                                        @foreach($pages->where('position','At a glance') as $item)
                                        <li><a href="{{url('page/'.$item->slug_en)}}">{{optional($item)->title_en}}</a></li>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Company</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        @foreach($pages->where('position','Company') as $item)
                                        <li><a href="{{url('page/'.$item->slug_en)}}">{{optional($item)->title_en}}</a></li>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget post-widget">
                                <div class="widget-title">
                                    <h4>Social Media</h4>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="{{ optional($setting)->fb_link }}"><img style="height: 75px;
                                            width: 80px;
                                            padding-left: 10px;" src="{{ asset('/images/'.optional($setting)->logo) }}" alt=""></a></figure>
                                        <h6><a href="blog-details.html">Facebook Page</a></h6>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="#"><img src="assets/images/resource/footer-post-2.jpg" alt=""></a></figure>
                                        <h6><a href="{{ optional($setting)->tube_link }}">Youtube Channel</a></h6>

                                    </div>
                                    @foreach($pages->where('position','Social Media') as $item)
                                        <li><a href="{{url('page/'.$item->slug_en)}}">{{optional($item)->title_en}}</a></li>
                                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h4>যোগাযোগ করুন</h4>
                                </div>
                                <div class="widget-content">
                                    <h6 style="margin-bottom: 0px !important;">Address:</h6>
                                    <span><i class="fas fa-map-marker-alt"></i>{{optional($setting)->address_bn}}</span>
                                    <h6 style="margin-bottom: 0px !important;">Mobile:</h6>
                                    <span>{{ optional($setting)->contact_bn }}</span>
                                    <h6 style="margin-bottom: 0px !important;">Email:</h6>
                                    <i class="fa fa-envelope"></i><p style="top: -30px;margin-left: 20px;color:#fff !important;">{{ optional($setting)->email }}</p>
                                    {{-- <h6 style="margin-bottom: 0px !important;top: -34px;">কর্ম দিবস / ঘন্টা:</h6> --}}
                                    <p style="top: -34px;color:#fff !important;"><i style="margin-right: 5px;color:#fff" class="far fa-clock"></i>শনি - বৃহ: ১০:00 টা - ৮:00 টা</p>
                                    <ul class="social-links clearfix">
                                        <li><a href="{{ optional($setting)->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ optional($setting)->tube_link }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                    {{-- <div class="call-box"><p><i class="fal fa-phone"></i><a href="tel:0123456789">+012 0000000</a></p></div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>এক পলকে</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        @foreach($pages->where('position','At a glance') as $item)
                                        <li><a href="{{url('page/'.$item->slug_bn)}}">{{ optional($item)->title_bn }}</a></li>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>প্রতিষ্ঠান</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        @foreach($pages->where('position','Company') as $item)
                                        <li><a href="{{url('page/'.$item->slug_bn)}}">{{ optional($item)->title_bn }}</a></li>
                                        
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget post-widget">
                                <div class="widget-title">
                                    <h4>সামাজিক মাধ্যম</h4>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="{{ optional($setting)->fb_link }}"><img style="height: 75px;
                                            width: 80px;
                                            padding-left: 10px;" src="{{ asset('/images/'.optional($setting)->logo) }}" alt=""></a></figure>
                                        <h6><a href="blog-details.html">ফেজবুক পেজ</a></h6>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="#"><img src="assets/images/resource/footer-post-2.jpg" alt=""></a></figure>
                                        <h6><a href="{{ optional($setting)->tube_link }}">ইউটিউব চ্যানেল</a></h6>

                                    </div>
                                    <div class="post">
                                        @foreach($pages->where('position','Social Media') as $item)
                                            <li><a href="{{url('page/'.$item->slug_bn)}}">{{ optional($item)->title_bn }}</a></li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="footer-bottom clearfix" style="padding: 0px 0px !important;">
                    <div class="text pull-left">
                        <p style="color:#fff !important;"><a style="color: #fff;" href="https://www.pilihoney.com/">Pili Honey</a>-2021</p>
                    </div>
                    <div class="text pull-right">
                        <p style="color:#fff !important;">All Right Reserved <a style="color:#fff;" href="https://www.facebook.com/mdssojib/">Design And Developed</a> By Pili Honey</p>
                    </div>
                </div>
            </div>
        </footer>

        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="far fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!--<script src="/assets/js/owl.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/owl.carousel.min.js" integrity="sha512-G7haLFl9E9lCZ1I3SSTav4xoGV/umB0O9WMA66YH6CUQkr7xTu3vUWXOQsZbXMMY0eVAOLMtf+g5ESWZKVxWAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/js/wow.js"></script>
    <script src="/assets/js/validation.js"></script>
    <script src="/assets/js/jquery.fancybox.js"></script>
    <script src="/assets/js/appear.js"></script>
    <script src="/assets/js/nav-tool.js"></script>
    <script src="/assets/js/scrollbar.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/jquery.bootstrap-touchspin.js"></script>
    <script src="/assets/js/jquery-ui.js"></script>
    <script src="/assets/js/bxslider.js"></script>
    <script src="{{ asset('sweetalert2.js')}}"></script>
    <script src="{{ asset('/assets/js/jquery.elevatezoom.js') }}" type="text/javascript"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    <script>
    $(document).ready(function(){
        var w = screen.width;
        if(w > 267){
          $(".owl-carousel").owlCarousel(
              {
                autoplay: true,
                loop: true,
                infinite:true,
                nav: false,
                ltr: true,
                dots:false,
                items: 1,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
              }
          );
            
        }else{
            $(".owl-carousel").owlCarousel(
              {
                autoplay: true,
                loop: true,
                infinite:true,
                nav: false,
                ltr: true,
                dots:false,
                items: 2,
                autoplayTimeout:4000,
                autoplayHoverPause:true,
              }
          );
        }
    });
    </script>

    @yield('js')
</body><!-- End of .page_wrapper -->
</html>








