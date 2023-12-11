@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3" style="max-width: 23% !important;">
                <div style="width: 100%;
                    padding: 5px;
                    background-color: white;
                    border: 1px solid #ddd;
                    box-shadow: 1px 1px #ddd;
                    border-radius: 5px;display: inline-flex;">
                    <button class="btn btn-primary" onclick="addAttrVal()" style="padding: 10px;">
                        <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                    </button>
                    <p style="margin-left: 5px;
                    font-weight: 700;
                    margin-bottom: 0px;">Add Product Attribute
                        <span style="float: left;
                    margin-left: 15px;" class="badge badge-warning">0/0</span>
                    </p>
                </div>
            </div>
            {{-- <div class="col-sm-3">
                <div id="disableDiv" style="width: 88%;
                    padding: 5px;
                    background-color: white;
                    border: 1px solid #ddd;
                    box-shadow: 1px 1px #ddd;
                    border-radius: 5px;display: inline-flex;">
                    <button class="btn btn-primary" onclick="addProductAvatar()" style="padding: 10px;">
                        <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                    </button>
                    <p style="margin-left: 5px;
                    font-weight: 700;
                    margin-bottom: 0px;">Add Product Images
                        <span style="float: left;
                    margin-left: 15px;" class="badge badge-warning">0/0</span>
                    </p>
                </div>
            </div> --}}
            <div class="col-sm-2">
              <div id="disableDiv" style="width: 100%;
                  padding: 5px;
                  background-color: white;
                  border: 1px solid #ddd;
                  box-shadow: 1px 1px #ddd;
                  border-radius: 5px;display: inline-flex;">
                  <a href="{{route('products')}}" style="padding: 10px;" class="btn btn-primary">
                      <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fas fa-undo"
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
            <div id="productAvatarInfo" class="card card-primary row col-md-12" style="display: none;">
                <div class="card-header" style="background-color: #007bff;
                    color: #fff;">
                    <h3 class="card-title">Add Product Attribute</h3>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <form id="avatarUpload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row col-md-12">
                            <div class="form-group col-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                <input readonly id="product_name" name="product_name" type="text" class="form-control"/>
                                <input id="product_id" name="product_id" type="hidden" class="form-control"/>
                            </div>
                            <div class="form-group col-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Attribute Name</label>
                                <input readonly id="attr_name" name="attr_name" type="text" class="form-control"/>
                                <input id="attr_id" name="attr_id" type="hidden" class="form-control"/>
                            </div>
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
            <div id="addAttrVal" class="card card-primary row col-md-12" style="
                    padding-top: 8px;
                    display: none;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add Product Attribute</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form method="POST" action="{{route('store.attribute')}}">
                @csrf
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                    <label class="form-check-label" for="exampleCheck1">Please input data in <strong>English language</strong></label>
                </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Select Product</label
                      >
                      <select
                        id="product_id"
                        name="product_id"
                        style="width:100%;"
                        class="custom-select mr-sm-2"
                      >
                        <option value="" selected="selected" hidden>select</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->product_name_en}}</option>
                        @endforeach
                      </select>
                    </div>
                      <div class="field_wrapper">
                        <div style="margin-bottom: 5px;">
                            <input id="weight_en" style="width: 24%" placeholder="weight" name="weight_en[]" name="weight_en[]" type="text" value=""/>
                            <input id="sale_price_en" style="width: 24%" placeholder="sales price" type="text" name="sale_price_en[]" value=""/>
                            <input id="pur_price_en" style="width: 24%" placeholder="purchase price" type="text" name="pur_price_en[]" value=""/>
                            <input id="qty_en" style="width: 25%" placeholder="qty" type="text" name="qty_en[]" value=""/>
                            <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                  </div>

                  <!-- //for bangla -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Please input data in <strong>Bangla language</strong></label>
                    </div>
                  <div class="card-body row">
                    <div class="form-group col-md-6">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Select Product</label
                      >
                      <select
                        id="product_id"
                        name="product_id"
                        style="width:100%;"
                        class="custom-select mr-sm-2"
                      >
                        <option value="" selected="selected" hidden>select</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->product_name_bn}}</option>
                        @endforeach
                      </select>
                    </div>
                      <div class="field_wrapper_bn col-md-6" style="margin-top: 34px;">
                        <div style="margin-bottom: 5px;">
                            <input id="weight_bn" style="width: 47%;height:35px;" placeholder="weight" name="weight_bn[]" type="text" value=""/>
                            <input id="sale_price_bn" style="width: 48%;height:35px;" placeholder="sales price" type="text" name="sale_price_bn[]" value=""/>
                            <a href="javascript:void(0);" class="add_button_bn" title="Add field"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                  </div>
                  <button
                    style="width: 100%;margin-bottom: 8px;"
                    type="submit"
                    class="btn btn-primary"
                  >
                    Submit
                  </button>
                </form>
            </div>
            <div id="editRole" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 308px;
                    display: none;
                ">
                <div class="card-header" style="color: #fff;
                background-color: #28a745;
                border-color: #28a745;
                box-shadow: none;">
                  <h3 class="card-title">Update Attribute Name</h3>
                  <a
                    href="#"
                    onclick="closeForm()"
                    class="close"
                    >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </a>
                </div>
              <form role="form">
                  <input type="hidden" id="slug" value="">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Name</label
                        >
                      <input
                        id="editName"
                        name="editName"
                        type="text"
                        class="form-control"
                        placeholder="Enter attribute name"
                      />
                    </div>
                    {{-- <div class="form-row align-items-center">
                        <div class="col-auto my-1" style="width:100%">
                          <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Select Attribute Value</label
                          >
                          <select
                            id="value"
                            style="width:100%;"
                            class="custom-select mr-sm-2"
                          >
                            <option value="" selected="selected" hidden>select</option>
                            @foreach ($attribute_values as $attr)
                                <option value="{{$attr->value}}">{{$attr->value}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div> --}}
                  </div>
                  <button
                    onclick="updateAttribute()"
                    style="width: 100%"
                    class="btn btn-success"
                  >
                    Submit
                  </button>
                </form>
            </div>
            <div id="attr_table" class="card col-md-12">
                <div class="card-header">
                <h3 class="card-title">Products Attributes English</h3>
                <div style="float: right">
                    <a href="{{ route('english') }}" class="badge badge-success">English</a>
                    <a href="{{ route('bangla') }}" class="badge badge-info">Bangla</a>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr role="row">
                        <th>Product Name</th>
                        <th>Weight</th>
                        <th>Purchase Price</th>
                        <th>Sales Price</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="attrValues">
                      @include('layouts.backend.attribute.attribute_tbl')
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        </div>

    @section('js')
    <script>
        $(function () {
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
        // $(function () {
        //     $("#example3").DataTable();
        //     $('#example4').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //     });
        // });

    </script>
      <script>
        function showId(id) {
          $('#size_n'+id).hide();
          $('#size_e'+id).show();
          $('#sale_n'+id).hide();
          $('#sale_e'+id).show();
          $('#pur_n'+id).hide();
          $('#pur_e'+id).show();
          $('#stock_n'+id).hide();
          $('#stock_e'+id).show();
          $('#btn_n'+id).hide();
          $('#btn_d_n'+id).hide();
          $('#btn_e'+id).show();
          $('#btn_d_e'+id).show();
        }

        function closeEdit(id){
          $('#size_n'+id).show();
          $('#size_e'+id).hide();
          $('#sale_n'+id).show();
          $('#sale_e'+id).hide();
          $('#pur_n'+id).show();
          $('#pur_e'+id).hide();
          $('#stock_n'+id).show();
          $('#stock_e'+id).hide();
          $('#btn_n'+id).show();
          $('#btn_d_n'+id).show();
          $('#btn_e'+id).hide();
          $('#btn_d_e'+id).hide();
        }
        function addAttrVal(){
            document.getElementById("addAttrVal").style.display = "block";
        }
        function closeAttrForm(){
          $("#addAttrVal").hide();
        }

        function updateAttribute(id){
            $.ajax({
                url: "{{ route('update.attribute') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id':id,
                    "weight": $('#size_e'+id).val(),
                    "pur_price": $('#pur_e'+id).val(),
                    "sale_price": $('#sale_e'+id).val(),
                    "qty": $('#stock_e'+id).val()
                },
                success: function(response) {
                  window.location.reload();
                  Toast.fire({
                      icon: 'success',
                      title: 'Attribute successfully'
                  });
                },
                error:function(){
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!'
                  })
                }
            })
        }

        function addProductAvatar(id,pro_id,name,pro) {
            $("#attr_id").val(id);
            $("#product_id").val(pro_id);
            $("#attr_name").val(name);
            $("#product_name").val(pro);
            // document.getElementById("addProductForm").style.display = "block";
            document.getElementById("attr_table").style.display = "none";
            document.getElementById("addAttrVal").style.display = "none";
            document.getElementById("productAvatarInfo").style.display = "block";
        }

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
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Product upload successfully'
                    });
                    $("#productAvatarInfo").hide();
                    $("#attr_table").show();
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
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div style="margin-bottom: 5px;"><input id="weight_en" placeholder="weight" style="width: 24%;margin-right: 4px;" type="text" name="weight_en[]" value=""/><input id="sale_price" style="width: 24%;margin-right: 3px;" placeholder="sales price" type="text" name="sale_price_en[]" value=""/><input id="pur_price" style="width: 24%;margin-right: 3px;" placeholder="purchase price" type="text" name="pur_price_en[]" value=""/><input id="qty" style="width: 25%;" placeholder="qty" type="text" name="qty_en[]" value=""/><a href="javascript:void(0);" class="remove_button"><i style="margin-left: 5px;" class="fa fa-minus"/></a></div>';
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        $(document).ready(function(){
            var maxField_bn = 10; //Input fields increment limitation
            var addButton_bn = $('.add_button_bn'); //Add button selector
            var wrapper_bn = $('.field_wrapper_bn'); //Input field wrapper
            var fieldHTML_bn = '<div style="margin-bottom: 5px;"><input id="size" placeholder="size" style="width: 47%;margin-right: 3px;height:35px;" type="text" name="weight_bn[]" value=""/><input id="sale_price" style="width: 48%;height:35px;" placeholder="sales price" type="text" name="sale_price_bn[]" value=""/><a href="javascript:void(0);" class="remove_button_bn"><i style="margin-left: 5px;" class="fa fa-minus"/></a></div>';
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton_bn).click(function(){
                //Check maximum number of input fields
                if(x < maxField_bn){
                    x++; //Increment field counter
                    $(wrapper_bn).append(fieldHTML_bn); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper_bn).on('click', '.remove_button_bn', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
        </script>
    @endsection
@endsection
