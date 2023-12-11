
@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Banner List</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <h3 class="card-title">Banar List</h3>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#bannerAddModal" style="float: right;">
                                <i class="fa fa-plus"></i> Add Banner
                            </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI #</th>
                                    <th>Banner</th>
                                    <th>Banner Image</th>
                                    <th>Category Name English</th>
                                    <th>Category Name Bangla</th>
                                    <th>Sub Title English</th>
                                    <th>Sub Title Bangla</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banars as $banar)
                                    <tr>
                                        <td>{{ $banar->id }}</td>
                                        <td>
                                            <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $banar->image) }}" />
                                        </td>
                                        <td>
                                            <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $banar->banner_image) }}" />
                                        </td>
                                        <td>
                                            {{ optional($banar->get_category)->cat_name_en }}
                                        </td>
                                        <td>
                                            {{ optional($banar->get_category)->cat_name_bn }}
                                        </td>
                                        <td>{{ $banar->sub_title_en }}</td>
                                        <td>{{ $banar->sub_title_bn }}</td>
                                        <td style="display:inline-flex;">
                                            <button onclick="editBanar({{ $banar }})" data-toggle="modal" data-target="#bannerEditModal" style="margin-right: 5px;"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteBanar({{ $banar }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="bannerAddModal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addNewLabel">Add Banner</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                        <form id="banarUpload">
                            @csrf
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="banner-product" class="col-form-label">Product Name English</label>
                                    <select class="select2 form-control" name="category_id" style="width: 100%">
                                        <option value="" selected="selected" hidden>Select product name</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->cat_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="banner-product" class="col-form-label">Product Name Bangla</label>
                                    <select class="select2 form-control" name="category_bn_id" style="width: 100%">
                                        <option value="" selected="selected" hidden>Select product name</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->cat_name_bn }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Sub Title English</label>
                                    <input name="sub_title_en" type="text" class="form-control"
                                        placeholder="Enter sub title english" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Sub Title Bangla</label>
                                    <input name="sub_title_bn" type="text" class="form-control"
                                        placeholder="Enter sub title bangla" />

                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Banar</label>
                                        <div style="height: 9.5rem; border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 100% !important; cursor: pointer;">
                                            <input id="image" type="file" class="form-control" name="image" style="opacity: 0; height: 9.5rem; cursor: pointer; padding: 0px;">
                                            <img src="" id="image-img" style="height: 9.5rem; width: 100% !important; cursor: pointer;margin-top: -184px;" />
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-4 offset-1">
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Banar Image</label>
                                        <div style="height: 9.5rem; border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 100% !important; cursor: pointer;">
                                            <input id="image_bn" type="file" class="form-control" name="image_bn" style="opacity: 0; height: 9.5rem; cursor: pointer; padding: 0px;">
                                            <img src="" id="image_bn-img" style="height: 9.5rem; width: 100% !important; cursor: pointer;margin-top: -184px;" />
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button style="width:100%" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </section>
</div>

<div class="modal fade" id="bannerEditModal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewLabel">Update Banner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form id="banarUpdate">
                @csrf
                <input type="text" id="slug" name="slug" hidden>

                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name English</label>
                        <input readonly id="cat-en" type="text" class="form-control"/>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name Bangla</label>
                        <input readonly id="cat-bn" name="sub_title_bn" type="text" class="form-control" />

                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Sub Title English</label>
                        <input id="sub_title_en" name="sub_title_en" type="text" class="form-control"
                            placeholder="Enter sub title english" />

                    </div>
                    <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Sub Title Bangla</label>
                        <input id="sub_title_bn" name="sub_title_bn" type="text" class="form-control"
                            placeholder="Enter sub title bangla" />

                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="col-form-label">Banar Image</label>
                            <div style="height: 9.5rem; border: dashed 1.5px blue;
                                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                    width: 100% !important; cursor: pointer;">
                                <input id="editImage" type="file" class="form-control" name="image" style="opacity: 0; height: 9.5rem; cursor: pointer; padding: 0px;">
                                <img src="" id="image-edit" style="height: 9.5rem; width: 100% !important; cursor: pointer;margin-top: -184px;" />
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 offset-1">
                        <div class="form-group">
                            <label for="image" class="col-form-label">Banar Image</label>
                            <div style="height: 9.5rem; border: dashed 1.5px blue;
                                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                    width: 100% !important; cursor: pointer;">
                                <input id="editImageBn" type="file" class="form-control" name="image_bn" style="opacity: 0; height: 9.5rem; cursor: pointer; padding: 0px;">
                                <img src="" id="image-bn-edit" style="height: 9.5rem; width: 100% !important; cursor: pointer;margin-top: -184px;" />
                            </div>

                        </div>

                    </div>
                </div>
            </form>
            <div class="modal-footer col-md-6" style="float: right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="updateBanar()" class="btn btn-primary">Update</button>
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
        //Initialize Select2 Elements
        $('.select2').select2({
            'height':'38px',
        });
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })

    });
</script>

<script type="text/javascript">
    function editBanar(banar) {
        $("#slug").val(banar.image);
        $("#product_id").val(banar.product_name);
        $("#sub_title_bn").val(banar.sub_title_bn);
        $("#sub_title_en").val(banar.sub_title_en);
        $("#cat-en").val(banar.get_category.cat_name_en);
        $("#cat-bn").val(banar.get_category.cat_name_bn);

        $("#image-edit").attr('src', "{{ asset('/images/') }}/" + banar.image);
        $("#image-bn-edit").attr('src', "{{ asset('/images/') }}/" + banar.banner_image);
    }

    $("#banarUpload").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('banar.store') }}",
            method: "POST",
            data: new FormData(this),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Banar upload successfull.'
                })
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


    function updateBanar() {
        $.ajax({
            url: "{{ route('banar.update') }}",
            method: "POST",
            data: new FormData(document.getElementById("banarUpdate")),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Banar update successfull.'
                })
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    };

    function deleteBanar(banar) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        id = banar.id;
        image = banar.image;

        $.ajax({
            url: "{{ route('admin.banar.delete') }}",
            type: "POST",
            data: {
                id: id,
                image: image,
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }


    function imageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function imageUrlbn(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_bn-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function urlImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-edit').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function urlImagebn(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-bn-edit').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        imageUrl(this);
    });
    $("#image_bn").change(function() {
        imageUrlbn(this);
    });
    $("#editImage").change(function() {
        urlImage(this);
    });
    $("#editImageBn").change(function() {
        urlImagebn(this);
    });

</script>

@endsection
@endsection
