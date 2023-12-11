@if(Session::get('lang') == "english")
    @foreach ($attributes as $key =>$attr)
    <tr id="id{{$attr->id}}" role="row" class="odd">
    <td class="sorting_1">{{ optional($attr->get_product)->product_name_en }}</td>
    <td class="sorting_1">
        <p id="size_n{{$attr->id}}">{{ $attr->weight_en }}</p>
        <input id="size_e{{$attr->id}}" type="text" style="display: none; width:70px" value="{{$attr->weight_en}}">
    </td>
    <td class="sorting_1">
        <p id="pur_n{{$attr->id}}">{{$attr->pur_price_en}}</p>
        <input id="pur_e{{$attr->id}}" type="text" style="display: none; width:100px" value="{{$attr->pur_price_en}}">
    </td>
    <td class="sorting_1">
        <p id="sale_n{{$attr->id}}">{{$attr->sale_price_en}}</p>
        <input id="sale_e{{$attr->id}}" type="text" style="display: none; width:100px" value="{{$attr->sale_price_en}}">
    </td>
    <td class="sorting_1">
        <p id="stock_n{{$attr->id}}">{{$attr->qty_en}}</p>
        <input id="stock_e{{$attr->id}}" type="text" style="display: none; width:70px;" value="{{$attr->qty_en}}">
    </td>
    @php
        $imgId = 0;
    @endphp
    @foreach ($attr->get_product_avatar  as $avtr)
        @php
            $imgId = $avtr->attribute_id;
        @endphp
    @endforeach

    <td class="sorting_1">
        @if ($attr->id != $imgId)
        <p style="cursor: pointer" onclick="addProductAvatar({{ $attr->id }},{{ $attr->product_id }},`{{ $attr->weight_en }}`,`{{ $attr->get_product->product_name_en }}`)"
            class="badge badge-danger">Image</p>
        @else
        <a href="{{ route('product.avatars',['id'=>$attr->id]) }}"
            class="badge badge-info">Images</a>
        @endif
    </td>
    <td style="display: inline-flex;">
        <button style="margin-right: 5px;" id="btn_n{{$attr->id}}" class="btn btn-primary btn-sm" onclick="showId({{$attr->id}})">
            <i class="fa fa-edit"></i>
        </button>
        <button style="margin-right: 5px;display:none;" id="btn_e{{$attr->id}}" class="btn btn-success btn-sm" onclick="updateAttribute({{$attr->id}})">
            <i class="fa fa-check"></i>
        </button>
        <button style="margin-right: 5px;display:none;" id="btn_d_e{{$attr->id}}" class="btn btn-danger btn-sm" onclick="closeEdit({{$attr->id}})">
            <i class="fas fa-undo"></i>
        </button>
        {{-- <form id="btn_d_n{{$attr->id}}" action="" method="post">
        @csrf
        <input type="text" name="role" value="user" hidden>
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>
        </button>
        </form> --}}
    </td>
    </tr>
    @endforeach
@else
    @foreach ($attributes as $key =>$attr)
    <tr id="id{{$attr->id}}" role="row" class="odd">
    <td class="sorting_1">{{ $attr->get_product->product_name_bn }}</td>
    <td class="sorting_1">
        <p id="size_n{{$attr->id}}">{{ $attr->weight_bn }}</p>
        <input id="size_e{{$attr->id}}" type="text" style="display: none; width:70px" value="{{$attr->weight_bn}}">
    </td>
    <td class="sorting_1">
        <p id="pur_n{{$attr->id}}">{{$attr->pur_price_bn}}</p>
        <input id="pur_e{{$attr->id}}" type="text" style="display: none; width:100px" value="{{$attr->pur_price_bn}}">
    </td>
    <td class="sorting_1">
        <p id="sale_n{{$attr->id}}">{{$attr->sale_price_bn}}</p>
        <input id="sale_e{{$attr->id}}" type="text" style="display: none; width:100px" value="{{$attr->sale_price_bn}}">
    </td>
    <td class="sorting_1">
        <p id="stock_n{{$attr->id}}">{{$attr->qty_bn}}</p>
        <input id="stock_e{{$attr->id}}" type="text" style="display: none; width:70px;" value="{{$attr->qty_bn}}">
    </td>
    <td style="display: inline-flex;">
        <button style="margin-right: 5px;" id="btn_n{{$attr->id}}" class="btn btn-primary btn-sm" onclick="showId({{$attr->id}})">
            <i class="fa fa-edit"></i>
        </button>
        <button style="margin-right: 5px;display:none;" id="btn_e{{$attr->id}}" class="btn btn-success btn-sm" onclick="updateAttribute({{$attr->id}})">
            <i class="fa fa-check"></i>
        </button>
        <button style="margin-right: 5px;display:none;" id="btn_d_e{{$attr->id}}" class="btn btn-danger btn-sm" onclick="closeEdit({{$attr->id}})">
            <i class="fas fa-undo"></i>
        </button>
        {{-- <form id="btn_d_n{{$attr->id}}" action="" method="post">
        @csrf
        <input type="text" name="role" value="user" hidden>
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>
        </button>
        </form> --}}
    </td>
    </tr>
    @endforeach
@endif
