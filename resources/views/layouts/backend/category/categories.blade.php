@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <div id="disableDiv" style="width: 70%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <button onclick="addCateForm()" style="padding: 10px;" class="btn btn-primary">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Category
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div id="addCat" class="card card-primary col-md-12" style="
                        padding-top: 8px;
                        display: none;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Category</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Category</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" id="addCategory" style="display: none;">
                        @csrf
                        <div class="card-body" style="position: relative">
                            <input type="text" id="id" name="id" hidden>
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect"
                                  >Select Menu</label
                                >
                                <select class="form-control" name="menu_id" id="menu_id">
                                    <option value="" selected="selected" hidden>select menu</option>
                                    @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">
                                        {{ $menu->menu_en }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name Bangla</label>
                                    <input id="cat_name_bn" name="cat_name_bn" type="text" class="form-control"
                                        placeholder="কেটেগরি নাম লিখুন" />
                                    <p id="catError" style="display: none;background-color: #e68888;
                                    color: #fff;
                                    margin-top: 2px;
                                    font-size: 12px;
                                    width: 56%;">Category field is required.</p>
                                    <p id="uniqueError" style="display: none;background-color: #e68888;
                                    color: #fff;
                                    margin-top: 2px;
                                    font-size: 12px;
                                    width: 64%;">Category name has already been taken.</p>

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name English</label>
                                    <input id="cat_name_en" name="cat_name_en" type="text" class="form-control"
                                        placeholder="Enter category name" />
                                    <p id="catError" style="display: none;background-color: #e68888;
                                    color: #fff;
                                    margin-top: 2px;
                                    font-size: 12px;
                                    width: 56%;">Category field is required.</p>
                                    <p id="uniqueError" style="display: none;background-color: #e68888;
                                    color: #fff;
                                    margin-top: 2px;
                                    font-size: 12px;
                                    width: 64%;">Category name has already been taken.</p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image" class="col-form-label">Cover Photo</label>
                                    <div style="height: 100px;
                                        border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 50% !important;
                                        cursor: pointer;">
                                        <input style="opacity: 0;
                                          height: 100px;
                                          cursor: pointer;
                                          padding: 0px;" id="cover" type="file" class="form-control" name="cover">
                                        <img src="" id="cover-img" style="height: 100px;
                                          width: 100% !important;
                                          cursor: pointer;margin-top: -134px;" />
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                                        >Position</label
                                      >
                                      <select class="form-control" name="position" id="position">
                                          <option value="" selected="selected" hidden>select Position</option>
                                          <option value="best_feature">Best Features</option>
                                          <option value="popular_product">Popular Products</option>
                                          <option value="just_for_you">Just For You</option>
                                      </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label class="mr-sm-2">Description(English)</label>
                                <textarea id="description_en" type="text" name="description_en"
                                class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Description(Bangla)</label>
                                <textarea id="description_bn" name="description_bn" type="text"
                                    class="form-control"></textarea>
                            </div>

                        </div>
                        <button id="submit" style="width: 100%;margin-bottom: 7px;" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>

                <div class="card col-12" id="catTable">
                    <div class="card-header">
                        <h3 class="card-title">All Categories is here</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        SL.No#
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Category Name Bangla
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Category Name English
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Category Cover
                                    </th>
                                    <th class="sorting" style="width: 204px;">
                                        Position
                                    </th>
                                    <th class="sorting" style="width: 204px;">
                                        Status
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($categories as $cat)
                                    @php
                                        $i++
                                    @endphp
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            {{ $i }}
                                        </td>
                                        <td class="sorting_1">{{ $cat->cat_name_bn }}</td>
                                        <td class="sorting_1">{{ $cat->cat_name_en }}</td>
                                        <td class="sorting_1">
                                            <img style="width: 100%;
                                            height: 39px;" src="{{ asset('/images/' . $cat->cover) }}" alt="">
                                        </td>
                                        <td>
                                            <small style="text-transform: capitalize" class="badge badge-warning">{{ $cat->position }}</small>
                                        </td>
                                        <td>
                                            @if ($cat->status == 0)
                                                <p class="badge badge-warning" onclick="catActive({{ $cat->id }})">Inactive</p>
                                            @else
                                                <p class="badge badge-success" onclick="catDeactive({{ $cat->id }})">Active</p>
                                            @endif
                                        </td>
                                        <td style="display: inline-flex;">
                                            <a style="margin-right: 5px;" href="{{ route('show.category',$cat->id) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {{-- <button class="btn btn-danger" onclick="deleteCat({{ $cat }})">
                                                <i class="fa fa-trash"></i>
                                            </button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>

@section('js')
<script>
    CKEDITOR.replace( 'description_en' );
    CKEDITOR.replace( 'description_bn' );
</script>
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

        function catActive(id){
            $.ajax({
                url: "{{ route('category.status') }}",
                method: "POST",
                data: {
                    '_token':"{{ csrf_token() }}",
                    id:id
                },
                success: function(response) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Category active successfully'
                    })
                },
                error: function(res) {
                    if (res.status == 401) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Category de-active successfully'
                        })
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                }
            })
        }

        function addCateForm(){
            $("#addCat").css({'display':'block'});
            $("#catTable").css({'display':'none'});
            $("#editCategory").css({'display':'none'});
            $("#addCategory").css({'display':'block'});
        }



        function closeForm() {
            $("#cardHeader").css({
                'color': '#fff',
                'background-color': '#007bff',
                'border-color': '#28a745',
                'box-shadow': 'none',
            });
            $("#cover-img").attr('src', "#");
            $('#id').val();
            $('#explor').val();
            $("#updateCategory").attr('id', 'addCategory');
            $("#update").hide();
            $("#submit").show();
            $("#cardTitle-add").show();
            $("#cardTitle-update").hide();
            $("#addCat").css({'display':'none'});
            $("#catTable").css({'display':'block'});
        }

        function coverUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#cover-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cover").change(function() {
            coverUrl(this);
        });



    $("#addCategory").submit(function(e) {
        e.preventDefault();
        for(var instanceName in CKEDITOR.instances){
            CKEDITOR.instances[instanceName].updateElement();
        }
        $.ajax({
            url: "{{ route('category.add') }}",
            method: "POST",
            data: new FormData(this),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {

                window.location.reload();
                $("#loading").hide();
                Toast.fire({
                    icon: 'success',
                    title: 'Category Upload successfully'
                })
                $("#addCat").css({'display':'none'});
                $("#catTable").css({'display':'block'});
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    });



    </script>
@endsection
@endsection
