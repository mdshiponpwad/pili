@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <div id="disableDiv" style="width: 100%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <a href="{{route('products')}}" style="padding: 10px;" class="btn btn-primary">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-undo"
                                style="margin-right: 5px;"></i>
                            </a>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Product
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="row">
                <div id="editproductAvatarInfo" class="card card-primary col-8 offset-2" style="padding-top: 8px;
                        border: 1px solid #ddd;
                        padding-bottom: 8px;
                        display: none;
                        height:258px;
                    ">
                    <div class="card-header" style="color: #fff;
                    background-color: #28a745;
                    border-color: #28a745;
                    box-shadow: none;">
                        <h3 class="card-title">Update Product Image</h3>
                        <button onclick="formClose()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    {{-- <div class="form-group" id="showAvatarForm">
                        <form id="update_avatar" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="text" id="slug" name="slug" hidden>
                            <div class="row col-12">
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Front Side Image</label>
                                    <div style="height: 100px;
                                        border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 60% !important;
                                        cursor: pointer;">
                                        <input style="opacity: 0;
                                      height: 100px;
                                      cursor: pointer;
                                      padding: 0px;" id="front" type="file" class="form-control" name="front">
                                        <img src="" id="front-img" style="height: 100px;
                                      width: 100% !important;
                                      cursor: pointer;
                                      margin-top: -134px;" />
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Back Side Image</label>
                                    <div style="height: 100px;
                                        border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 60% !important;
                                        cursor: pointer;">
                                        <input style="opacity: 0;
                                      height: 100px;
                                      cursor: pointer;
                                      padding: 0px;" id="back" type="file" class="form-control" name="back">
                                        <img src="" id="back-img" style="height: 100px;
                                      width: 100% !important;
                                      cursor: pointer;
                                      margin-top: -134px;" />
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Left Side Image</label>
                                    <div style="height: 100px;
                                        border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 60% !important;
                                        cursor: pointer;">
                                        <input style="opacity: 0;
                                      height: 100px;
                                      cursor: pointer;
                                      padding: 0px;" id="left" type="file" class="form-control" name="left">
                                        <img src="" id="left-img" style="height: 100px;
                                      width: 100% !important;
                                      cursor: pointer;
                                      margin-top: -134px;" />
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Right Side Image</label>
                                    <div style="height: 100px;
                                        border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 60% !important;
                                        cursor: pointer;">
                                        <input style="opacity: 0;
                                      height: 100px;
                                      cursor: pointer;
                                      padding: 0px;" id="right" type="file" class="form-control" name="right">
                                        <img src="" id="right-img" style="height: 100px;
                                      width: 100% !important;
                                      cursor: pointer;
                                      margin-top: -134px;" />
                                    </div>
                                </div>
                            </div>
                            <button id="submitData" class="btn btn-success" style="width: 100%;"
                                type="submit">Submit</button>
                            <input type="hidden" id="avtrId{{ $avtr->id }}" name="avtr_id" value="{{ $avtr->id }}">
                        </form>
                    </div> --}}
                </div>
                <div id="product_table" class="card col-12" style="border: 1px solid #ddd;display:block;">
                    <div class="card-header">
                        <h3 class="card-title">All Products is here</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">
                                        Product Name
                                    </th>
                                    <th class="sorting_asc">
                                        Weight
                                    </th>
                                    <th class="sorting_asc">
                                        Front Image
                                    </th>
                                    <th class="sorting_asc">
                                        Back Image
                                    </th>
                                    <th class="sorting_asc">
                                        Left Image
                                    </th>
                                    <th class="sorting_asc">
                                        Right Image
                                    </th>

                                    <th class="sorting">
                                        Status
                                    </th>
                                    <th class="sorting">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avatars as $key => $avtr)
                                    <tr role="row" class="odd">
                                        <form id="update{{ $key }}">
                                        @csrf
                                        @if(Session::get('lang')=='english')
                                        <td class="sorting_1">{{ $avtr->get_attribute->get_product->product_name_en }}</td>
                                        <td class="sorting_1">{{ $avtr->get_attribute->weight_en }}</td>
                                        @else
                                        <td class="sorting_1">{{ $avtr->get_attribute->get_product->product_name_bn }}</td>
                                        <td class="sorting_1">{{ $avtr->get_attribute->weight_bn }}</td>
                                        @endif
                                        <td class="sorting_1">
                                            <img id="img-f{{$avtr->id}}" style="height: 50px;width: 120px;"
                                                src="{{ asset('/images/' . $avtr->front) }}" />

                                            <div class="form-group" id="img-front{{$avtr->id}}" style="display: none;">
                                                <div style="height: 100px;
                                                border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 100% !important;
                                                cursor: pointer;">
                                                    <input style="opacity: 0;
                                                    height: 124px;
                                                    cursor: pointer;
                                                    padding: 0px;" onclick="getAvId4({{$avtr->id}})" id="edit-front{{$avtr->id}}" type="file" class="form-control" name="front">
                                                    <img src="{{ asset('/images/' . $avtr->front) }}" id="edit-front-img{{$avtr->id}}" style="height: 100px;
                                                    width: 100% !important;
                                                    cursor: pointer;
                                                    margin-top: -180px;" />
                                                        <input type="hidden" id="brId{{$avtr->id}}" name="avtr_id" value="{{$avtr->id}}">

                                                </div>
                                            </div>
                                        </td>
                                        <td class="sorting_1">
                                            <img id="img-b{{$avtr->id}}" style="height: 50px;width: 120px;"
                                                src="{{ asset('/images/' . $avtr->back) }}" />

                                            <div class="form-group" id="img-back{{$avtr->id}}" style="display: none;">
                                                <div style="height: 100px;
                                                border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 100% !important;
                                                cursor: pointer;">
                                                    <input style="opacity: 0;
                                                    height: 124px;
                                                    cursor: pointer;
                                                    padding: 0px;" onclick="getAvId3({{$avtr->id}})" id="edit-back{{$avtr->id}}" type="file" class="form-control" name="back">
                                                    <img src="{{ asset('/images/' . $avtr->back) }}" id="edit-back-img{{$avtr->id}}" style="height: 100px;
                                                    width: 100% !important;
                                                    cursor: pointer;
                                                    margin-top: -180px;" />
                                                        <input type="hidden" id="brId{{$avtr->id}}" name="avtr_id" value="{{$avtr->id}}">

                                                </div>
                                            </div>
                                        </td>
                                        <td class="sorting_1">
                                            <img id="img-l{{$avtr->id}}" style="height: 50px;width: 120px;"
                                                src="{{ asset('/images/' . $avtr->left) }}" />

                                            <div class="form-group" id="img-left{{$avtr->id}}" style="display: none;">
                                                <div style="height: 100px;
                                                border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 100% !important;
                                                cursor: pointer;">
                                                    <input style="opacity: 0;
                                                    height: 124px;
                                                    cursor: pointer;
                                                    padding: 0px;" onclick="getAvId2({{$avtr->id}})" id="edit-left{{$avtr->id}}" type="file" class="form-control" name="left">
                                                    <img src="{{ asset('/images/' . $avtr->left) }}" id="edit-left-img{{$avtr->id}}" style="height: 100px;
                                                    width: 100% !important;
                                                    cursor: pointer;
                                                    margin-top: -180px;" />
                                                        <input type="hidden" id="brId{{$avtr->id}}" name="avtr_id" value="{{$avtr->id}}">

                                                </div>
                                            </div>
                                        </td>
                                        <td class="sorting_1">
                                            <img id="img-r{{$avtr->id}}" style="height: 50px;width: 120px;"
                                                src="{{ asset('/images/' . $avtr->right) }}" />

                                            <div class="form-group" id="img-right{{$avtr->id}}" style="display: none;">
                                                <div style="height: 100px;
                                                border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 100% !important;
                                                cursor: pointer;">
                                                    <input style="opacity: 0;
                                                        height: 124px;
                                                        cursor: pointer;
                                                        padding: 0px;" onclick="getAvId1({{$avtr->id}})" id="edit-right{{$avtr->id}}" type="file" class="form-control" name="right">
                                                    <img src="{{ asset('/images/' . $avtr->right) }}" id="edit-right-img{{$avtr->id}}" style="height: 100px;
                                                        width: 100% !important;
                                                        cursor: pointer;margin-top: -180px;" />
                                                        <input type="hidden" id="brId{{$avtr->id}}" name="avtr_id" value="{{$avtr->id}}">

                                                </div>
                                            </div>
                                        </td>
                                      </form>
                                        <td>
                                            @if ($avtr->status == 0)
                                                <p class="badge badge-warning">Active</p>
                                            @else
                                                <p class="badge badge-success">Inactive</p>
                                            @endif
                                        </td>
                                        <td style="display: inline-flex;">
                                            <button id="edit_btn_n{{ $avtr->id }}" onclick="editProductAvatar({{ $avtr->id }})" style="margin-right: 5px;"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button id="submit_btn_e{{ $avtr->id }}" type="submit" onclick="updateAvtr({{$key}})" style="margin-right: 5px;display:none;"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button id="undo_btn_e{{ $avtr->id }}" onclick="closeAvtr({{ $avtr->id }})" style="margin-right: 5px;display:none;"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

    </script>
    <script>

        function editProductAvatar(id) {
            $("#edit_btn_n"+id).hide();
            $("#submit_btn_e"+id).show();
            $("#undo_btn_e"+id).show();
            $("#img-f"+id).hide();
            $("#img-b"+id).hide();
            $("#img-l"+id).hide();
            $("#img-r"+id).hide();
            $("#img-front"+id).show();
            $("#img-back"+id).show();
            $("#img-left"+id).show();
            $("#img-right"+id).show();
            //  $("#brId"+id).val(id);
        }
        function closeAvtr(id){
            $("#edit_btn_n"+id).show();
            $("#submit_btn_e"+id).hide();
            $("#undo_btn_e"+id).hide();
            $("#img-f"+id).show();
            $("#img-b"+id).show();
            $("#img-l"+id).show();
            $("#img-r"+id).show();
            $("#img-front"+id).hide();
            $("#img-back"+id).hide();
            $("#img-left"+id).hide();
            $("#img-right"+id).hide();
        }

        function updateAvtr(key){
            event.preventDefault();
            $.ajax({
                url: "{{ route('avatar.update') }}",
                method: "POST",
                data: new FormData(document.getElementById("update"+key)),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                   window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Product image update successfully'
                    });
                },
                error:function(res){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            })
        }


        function frontUrl(input,valId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit-front-img'+valId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function backUrl(input,valId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit-back-img'+valId).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function leftUrl(input,valId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit-left-img'+valId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function rightUrl(input,valId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit-right-img'+valId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function getAvId4(id){
            $('#edit-front'+id).change(function() {
                var valId = id;
                frontUrl(this,valId);
            });
        }
        function getAvId3(id){
            $('#edit-back'+id).change(function() {
                var valId = id;
                backUrl(this,valId);
            });
        }
        function getAvId2(id){
            $('#edit-left'+id).change(function() {
                var valId = id;
                leftUrl(this,valId);
            });
        }
        function getAvId1(id){
            $('#edit-right'+id).change(function() {
                var valId = id;
                rightUrl(this,valId);
            });
        }
    </script>
@endsection
@endsection
