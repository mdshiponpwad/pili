@auth

    <ul style="padding: 10px;padding: 10px;
    overflow-y: scroll;
    height: 350px;
    overflow-x: hidden;">
        @php
            $total = 0;
        @endphp
        @foreach ($cart as $crt)
            <li style="display: inline-flex;
            width: 100%;
            border-bottom: 1px solid #ddd;
            margin-bottom: 5px;margin-left:0px;">
                <div style="float: right;
                width: 50%;
                color: #000;
                margin-bottom: 5px;display: inline-grid;">
                    @foreach ($attributes->where('product_id',$crt->product_id)->where('weight_en',$crt->weight_en) as $attr)
                        <img style="height: 80px;
                        width: 80px;
                        background: #ddd;" src="{{ asset('/images/'.$attr->get_product_avatar[0]->front) }}" alt="">

                    @endforeach
                    <span style="color: #000;">{{ $crt->get_product->product_name_en }}</span>
                    <span style="color: #000;">{{ $crt->weight_en }}</span>
                </div>
                <div style="float: right;width: 50%;color: #000;border-bottom: 5px;text-align: right;" >
                    <span><strong style="color: #000;">{{ $crt->qty }} x </strong> </span>
                    <span><strong style="color: #000;">{{ $crt->price }}</strong> TK</span>
                </div>
            </li>
            @php
                $total += $crt->price*$crt->qty;
            @endphp
        @endforeach
        <label for=""><strong style="color: #000;">Total</strong></label>
        <div style="float: right;">
            <label for="">
                <strong style="color: #000;" class="badge badge-warning">{{ $total }} Tk</strong>
            </label>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
         
            <a href="{{ route('proceedCheckout') }}"><button class="theme-btn-two">Chackout</button></a> 
            
        </div>
    </ul>
@endauth
