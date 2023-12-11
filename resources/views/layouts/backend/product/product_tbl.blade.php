@foreach ($products as $product)
@if(Session::get('lang')=='english')
    <tr role="row" class="odd">
        <td class="sorting_1">{{ optional($product->get_category)->cat_name_en }}</td>
        <td class="sorting_1">{{ optional($product)->product_name_en }}</td>
        <td class="sorting_1">{{ optional($product)->color_en }}</td>
        <td class="sorting_1">{{ Str::limit($product->description_en,50) }}</td>
        <td>
            @if ($product->status == 0)
            <p style="cursor: pointer;margin: 0px;" class="badge badge-warning">Active</p>
            @else
            <p style="cursor: pointer;margin: 0px;" class="badge badge-success">Inactive</p>
            @endif

            @php
            $id = null;
            $imgId=null;
            @endphp
            @foreach($product->get_attribute  as $attr)
                @php
                    $id = $attr->product_id;
                @endphp
            @endforeach
            @foreach ($product->get_product_avatars  as $avtr)
                @php
                    $imgId = $avtr->product_id;
                @endphp
            @endforeach

            @if ($product->id != $id)
            <a href="{{route('attributes')}}" class="badge badge-danger">Set Attribute</a>
            @else
            <a href="{{route('attributes')}}" class="badge badge-info">Set Attribute</a>
            @endif

        </td>

        <td style="display: inline-flex;">
            <button onclick="editProduct({{ $product }})" style="margin-right: 5px;"
                class="btn btn-primary">
                <i class="fa fa-edit"></i>
            </button>
            <form action="#" method="POST">
                @csrf
                <button class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
    @else
    <tr role="row" class="odd">
        <td class="sorting_1">{{ optional($product->get_category)->cat_name_bn }}</td>
        <td class="sorting_1">{{ optional($product)->product_name_bn }}</td>
        <td class="sorting_1">{{ optional($product)->color_bn }}</td>
        <td class="sorting_1">{{ Str::limit($product->description_bn,50) }}</td>
        <td>
            <p>Image</p>

        </td>

        <td style="display: inline-flex;">
            <button onclick="editProduct({{ $product }})" style="margin-right: 5px;"
                class="btn btn-primary">
                <i class="fa fa-edit"></i>
            </button>
            <form action="#" method="POST">
                @csrf
                <button class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endif
@endforeach
