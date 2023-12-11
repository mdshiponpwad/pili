@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <div id="disableDiv" style="width: 102%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <button class="btn btn-primary" onclick="addProduct()" style="padding: 10px;">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                    style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Product
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div id="disableDiv" style="width: 100%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <a href="{{route('attributes')}}" class="btn btn-primary" style="padding: 10px;">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                    style="margin-right: 5px;"></i>
                            </a>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Product Attribute
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
                <div id="addProductForm" class="card card-primary col-10 offset-1" style="padding-top: 8px;
                        border: 1px solid #ddd;
                        padding-bottom: 8px;
                        display: none;
                    ">
                    <div class="card-header" style="background-color: #007bff;
                        color: #fff;">
                        <h3 class="card-title">Add New Product Info</h3>
                        <button onclick="formClose()" class="close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="productInfo" style="display: none;">
                        @csrf
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Please input data in <strong>English language</strong></label>
                        </div>
                        <div class="card-body row col-12">
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Category</label>
                                    <select class="form-control" name="category_en_id" id="category_en_id">
                                        <option value="" hidden selected="selected">select</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->cat_name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                    <input id="product_name_en" name="product_name_en" type="text" class="form-control"
                                        placeholder="Enter product name" />
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Code</label>
                                    <input id="product_code_en" name="product_code_en" type="text" class="form-control"
                                        placeholder="Enter product code" />
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Color</label>
                                    <input id="color_en" name="color_en" type="text" class="form-control"
                                        placeholder="Enter product color" />
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Product Description</label>
                                <textarea id="description_en" name="description_en" type="text" class="form-control"
                                    placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        <!-- //for bangla -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Please input data in <strong>Bangla language</strong></label>
                        </div>
                        <div class="card-body row col-12">
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Category</label>
                                    <select class="form-control" name="category_bn_id" id="category_bn_id">
                                        <option value="" hidden selected="selected">select</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->cat_name_bn }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                    <input id="product_name_bn" name="product_name_bn" type="text" class="form-control"
                                        placeholder="Enter product name" />
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Code</label>
                                    <input id="product_code_bn" name="product_code_bn" type="text" class="form-control"
                                        placeholder="Enter product code" />
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Color</label>
                                    <input id="color_bn" name="color_bn" type="text" class="form-control"
                                        placeholder="Enter product color" />
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Product Description</label>
                                <textarea id="description_bn" name="description_bn" type="text" class="form-control"
                                    placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        <button id="submit" type="submit" style="width: 100%" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                    <div id="productAvatarInfo" class="card-body row col-12" style="display: none;">

                        <div class="form-group">
                            <input type="text" id="single_error" name="single_error" readonly style="display:none;border: none;
                            width: 22%;
                            background-color: #f15353;
                            color: #fff;
                            font-size: 10px; margin-top:2px;">
                            <p id="stayImageWarning" style="background-color: rgb(241, 230, 83);
                            color: #000;
                            font-weight: 700;
                            width: 33%;
                            display:none;
                            padding: 5px;">This product images already uploaded.</p>
                            <form id="avatarUpload" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                    <input readonly id="product_name" name="product_name" type="text" class="form-control"/>
                                    <input id="product_id" name="product_id" type="hidden" class="form-control"/>
                                </div>
                                <input style="display:none;border: none;
                                    width: 22%;
                                    background-color: #f15353;
                                    color: #fff;
                                    font-size: 10px; margin-top:2px;" type="text" id="error" name="error" readonly>
                                <div class="row col-12" id="imgField">
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
                                            <img src="#" id="front-img" style="height: 100px;
                                          width: 100% !important;
                                          cursor: pointer;
                                          margin-top: -134px;" />
                                        </div>
                                        <input style="display:none;border: none;
                                            width: 75%;
                                            background-color:#f15353;;
                                            color: #fff;
                                            font-size: 10px;margin-top:2px;" type="text" id="frontError" name="frontError"
                                            readonly>
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
                                            <img src="#" id="back-img" style="height: 100px;
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
                                            <img src="#" id="left-img" style="height: 100px;
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
                                            <img src="#" id="right-img" style="height: 100px;
                                          width: 100% !important;
                                          cursor: pointer;
                                          margin-top: -134px;" />
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" style="width: 100%;"
                                    type="submit">Submit</button>

                            </form>
                        </div>

                    </div>

                </div>
                <div id="editProductForm" class="card card-primary col-8 offset-2" style="padding-top: 8px;
                        border: 1px solid #ddd;
                        padding-bottom: 8px;
                        display: none;
                    ">
                    <div class="card-header" style="color: #fff;
                    background-color: #28a745;
                    border-color: #28a745;
                    box-shadow: none;">
                        <h3 class="card-title">Update Product</h3>
                        <a href="#" onclick="closeForm()" class="close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <form id="productInfoEdit">
                        @csrf
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Please input data in <strong>English language</strong></label>
                        </div>
                        <div class="card-body row col-12">
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Category</label>
                                    <select class="form-control" name="category_en_id" id="edit_category_en_id">
                                        <option value="" hidden selected="selected">select</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->cat_name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                    <input id="edit_product_name_en" name="product_name_en" type="text" class="form-control"
                                        placeholder="Enter product name" />
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Code</label>
                                    <input id="edit_product_code_en" name="product_code_en" type="text" class="form-control"
                                        placeholder="Enter product code" />
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Color</label>
                                    <input id="edit_color_en" name="color_en" type="text" class="form-control"
                                        placeholder="Enter product color" />
                                </div>
                            </div>
                            <div class="form-group row col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Product Description</label>
                                <textarea id="edit_description_en" name="description_en" type="text" class="form-control"
                                    placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        <!-- //for bangla -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Please input data in <strong>Bangla language</strong></label>
                        </div>
                        <div class="card-body row col-12">
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Category</label>
                                    <select class="form-control" name="category_bn_id" id="edit_category_bn_id">
                                        <option value="" hidden selected="selected">select</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->cat_name_bn }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                    <input id="edit_product_name_bn" name="product_name_bn" type="text" class="form-control"
                                        placeholder="Enter product name" />
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Code</label>
                                    <input id="edit_product_code_bn" name="product_code_bn" type="text" class="form-control"
                                        placeholder="Enter product code" />
                                </div>
                                <div class="form-group col-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Color</label>
                                    <input id="edit_color_bn" name="color_bn" type="text" class="form-control"
                                        placeholder="Enter product color" />
                                </div>
                            </div>
                            <div class="form-group row col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Product Description</label>
                                <textarea id="edit_description_bn" name="description_bn" type="text" class="form-control"
                                    placeholder="Enter product description"></textarea>
                            </div>
                            <input id="edit_product" name="slug_en" type="hidden"/>
                        </div>
                        <button type="submit" style="width: 100%" class="btn btn-success">
                            Submit
                        </button>
                    </form>
                </div>
                <div id="product_table" class="card col-12" style="border: 1px solid #ddd;display:block;">
                    <div class="card-header">
                        <h3 class="card-title">All Products is here</h3>
                        <div style="float: right">
                            <a href="{{ route('english') }}" class="badge badge-success">English</a>
                            <a href="{{ route('bangla') }}" class="badge badge-info">Bangla</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="countRow">
                                @include('layouts.backend.product.product_tbl')
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

        function frontUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#front-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function backUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#back-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function leftUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#left-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function rightUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#right-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#front").change(function() {
            frontUrl(this);
        });
        $("#back").change(function() {
            backUrl(this);
        });
        $("#left").change(function() {
            leftUrl(this);
        });
        $("#right").change(function() {
            rightUrl(this);
        });

        function formClose() {
            document.getElementById("addProductForm").style.display = "none";
            document.getElementById("product_table").style.display = "block";
        }

        function editProduct(pro) {
            $("#edit_category_en_id").val(pro.category_en_id);
            $("#edit_category_bn_id").val(pro.category_bn_id);
            $("#edit_product_name_en").val(pro.product_name_en);
            $("#edit_product_name_bn").val(pro.product_name_bn);
            $("#edit_product_code_en").val(pro.product_code_en);
            $("#edit_product_code_bn").val(pro.product_code_bn);
            $("#edit_color_en").val(pro.color_en);
            $("#edit_color_bn").val(pro.color_bn);
            $("#edit_description_en").val(pro.description_en);
            $("#edit_description_bn").val(pro.description_bn);
            document.getElementById("addProductForm").style.display = "none";
            document.getElementById("editProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
            $("#edit_product").val(pro.slug_en);
        }

        function closeForm() {
            document.getElementById("editProductForm").style.display = "none";
            document.getElementById("addProductForm").style.display = "none";
            document.getElementById("product_table").style.display = "block";
        }

        function addProduct() {
            document.getElementById("addProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
            document.getElementById("productInfo").style.display = "block";
            document.getElementById("productAvatarInfo").style.display = "none";
        }

        function addProductAvatar(id,name) {
            $("#product_id").val(id);
            $("#product_name").val(name);
            document.getElementById("addProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
            document.getElementById("productInfo").style.display = "none";
            document.getElementById("productAvatarInfo").style.display = "block";
        }

        $('#productInfo').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('product.store') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'html',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                   $('#productInfo')[0].reset();
                   $("#countRow").html(response);
                    Toast.fire({
                        icon: 'success',
                        title: 'Product upload successfully'
                    });
                    $("#addProductForm").hide();
                    $("#productInfo").hide();
                    $("#product_table").show();
                },
                error:function(res){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            })
        })

        $("#productInfoEdit").on('submit',function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ route('product.update') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'html',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                   $('#productInfoEdit')[0].reset();
                   $("#countRow").html(response);
                    Toast.fire({
                        icon: 'success',
                        title: 'Product upload successfully'
                    });
                    $("#addProductForm").hide();
                    $("#editProductForm").hide();
                    $("#product_table").show();
                },
                error:function(res){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    })
                }
            })
        })

        $("#avatarUpload").on('submit',function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ route('avatar.store') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'html',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Product upload successfully'
                    });
                    $("#productAvatarInfo").hide();
                    $("#product_table").show();
                },
                error:function(res){
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
