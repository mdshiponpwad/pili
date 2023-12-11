<div class="col-lg-5 col-md-12 col-sm-12 image-column">

    <div class="slider-inner">
        <div class="bxslider">
            <div class="slider-content">
                <div class="product-image" style="padding: 0px !important;">
                    <figure class="image" style="background-color: #ddd;height: 516px;">
                        <a href="#" class="lightbox-image" data-fancybox="gallery">
                            <img style="height: 100% !important;" id="zoom_01" src="{{ asset('/images/'.$attribute->get_product_avatar[0]->front) }}" data-zoom-image="{{ asset('/images/'.$attribute->get_product_avatar[0]->front) }}"/>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-7 col-md-12 col-sm-12 content-column" >


    @if (Session::get('lang') == 'english')
        <div class="product-details">
            <h2>{{ $attribute->get_product->product_name_en }}</h2>
            <h3><span style="color:#b73604" id="price">{{ $attribute->sale_price_en }}</span> TK</h3>
            <div class="text">
                <p>{{ Str::limit($attribute->get_product->description_en, 200, '...') }}</p>
            </div>
            
            <div class="size-box">
                <h3>Weight</h3>
                <ul class="select-inner">
                    <li class="custom-check-box">
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input id="weight" value="{{ $attribute->weight_en }}" type="checkbox" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span onclick="getData()" class="description">{{$attribute->weight_en}}</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="color-box">
                <h3>Color</h3>
                <div class="color-list clearfix">
                    <span style="background: {{ $attribute->get_product->color_en }} !important;border-radius: 20px;
                        border: 2px solid #ddd;" class="color"></span>
                </div>
            </div>
            <div class="addto-cart-box">
                <ul class="clearfix">
                    <li class="item-quantity">
                        <div class="input-group bootstrap-touchspin">
                            {{-- <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"> --}}
                            {{-- </span> --}}
                            <input id="qty" class="quantity-spinner form-control" type="number" value="1" name="quantity" style="display: block;">
                            {{-- <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"> --}}
                            {{-- </span><span class="input-group-btn-vertical">
                                <button class="btn btn-default bootstrap-touchspin-up" type="button">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </button>
                                <button class="btn btn-default bootstrap-touchspin-down" type="button">
                                    <i class="glyphicon glyphicon-chevron-down"></i>
                                </button>
                            </span> --}}
                        </div>
                    </li>
                    <li><button type="button" onclick="addToCart({{ $attribute->get_product->id }})" class="theme-btn-two">Add To Cart</button></li>
                </ul>
            </div>

        </div>
        @else
        <div class="product-details">
            <h2>{{ $attribute->get_product->product_name_bn }}</h2>
            <h3><span style="color:#b73604" id="price">{{ $attribute->sale_price_bn }}</span></h3>
            <div class="text">
                <p>{{ Str::limit($attribute->get_product->description_bn, 200, '...') }}</p>
            </div>
            <div class="size-box">
                <h3>ওজন</h3>
                <ul class="select-inner">
                    @foreach ($attributes->where('product_id',$attribute->get_product->id) as $attr)
                    <li class="custom-check-box">
                        <div class="custom-controls-stacked">
                            <label class="custom-control material-checkbox">
                                <input type="checkbox" class="material-control-input">
                                <span class="material-control-indicator"></span>
                                <span onclick="getData(`{{ $attr->weight_bn }}`,{{ $attr->product_id }},'weight_bn')" class="description">{{ $attr->weight_bn }}</span>
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="color-box">
                <h3>Color</h3>
                <div class="color-list clearfix">
                    <span style="background: {{ $attribute->get_product->color_bn }} !important;border-radius: 20px;
                        border: 2px solid #ddd;" class="color"></span>
                </div>
            </div>
            <div class="addto-cart-box">
                <ul class="clearfix">
                    <li class="item-quantity">
                        <div class="input-group bootstrap-touchspin">
                            {{-- <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"> --}}
                            {{-- </span> --}}
                            <input class="quantity-spinner form-control" type="number" value="1" name="quantity" style="display: block;">
                            {{-- <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"> --}}
                            {{-- </span><span class="input-group-btn-vertical">
                                <button class="btn btn-default bootstrap-touchspin-up" type="button">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </button>
                                <button class="btn btn-default bootstrap-touchspin-down" type="button">
                                    <i class="glyphicon glyphicon-chevron-down"></i>
                                </button>
                            </span> --}}
                        </div>
                    </li>
                    <li><button type="button" class="theme-btn-two">Add To Cart</button></li>
                </ul>
            </div>
        </div>
    @endif
</div>
