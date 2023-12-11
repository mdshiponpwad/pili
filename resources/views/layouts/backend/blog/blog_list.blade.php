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
                            margin-bottom: 0px;">Add Blog
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div id="addCl" class="card card-primary col-md-12" style="
                        padding-top: 8px;
                        display: none;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Blog</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Client</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" id="addBlog">
                        @csrf
                        <div class="card-body" style="position: relative">
                            <input type="text" id="id" name="id" hidden>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Title (Bangla)</label>
                                    <input id="title_bn" name="title_bn" type="text" class="form-control"
                                        placeholder="টাইটেল লিখুন" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Title (English)</label>
                                    <input id="title_en" name="title_en" type="text" class="form-control"
                                        placeholder="Enter title" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 offset-3">
                                    <label for="image" class="col-form-label">Cover Image</label>
                                    <div style="height: 200px;
                                        border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 100% !important;
                                        cursor: pointer;">
                                        <input style="opacity: 0;
                                          height: 200px;
                                          cursor: pointer;
                                          padding: 0px;" id="cover" type="file" class="form-control" name="cover">
                                        <img src="" id="cover-img" style="height: 200px;
                                          width: 100% !important;
                                          cursor: pointer;margin-top: -231px;" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mr-sm-2">Description (English)</label>
                                <textarea id="description_en" type="text" name="description_en"
                                class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Description (Bangla)</label>
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
                        <h3 class="card-title">All Clients is here</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        SL.No#
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Title Bangla
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Title English
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Image
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Description(English)
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Description(Bangla)
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
                                @foreach ($blogs as $blog)
                                @php
                                    $i++;
                                @endphp
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            {{ $i }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($blog)->title_en }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($blog)->title_bn }}
                                        </td>
                                        <td class="sorting_1">
                                            <img style="width: 100%;
                                            height: 39px;" src="{{ asset('/images/'.optional($blog)->image) }}" alt="">
                                        </td>
                                        <td class="sorting_1">
                                            {{ Str::limit(optional($blog)->description_en, 150, '...') }}
                                        </td>
                                        <td>
                                            {{ Str::limit(optional($blog)->description_bn, 150, '...') }}
                                        </td>
                                        <td style="display: inline-flex;">
                                            <a style="margin-right: 5px;" href="{{ url('/admin/blog-show/'.$blog->id) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger" onclick="deleteBlog({{ optional($blog)->id }})">
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
        </section>

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
                "autoWidth": false
            });
        });


    CKEDITOR.replace( 'description_en' );
    CKEDITOR.replace( 'description_bn' );
</script>
    <script>

        function deleteBlog(id){
            $.ajax({
                url: "{{ url('admin/client-delete') }}/"+id,
                type: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    id: id,
                },
                success: function(response) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Blog delete successfully'
                    })
                }
            });
        }


        function addCateForm(){
            $("#catTable").css({'display':'none'});
            $("#addCl").css({'display':'block'});
        }



        function closeForm() {
            $("#catTable").css({'display':'block'});
            $("#addCl").css({'display':'none'});
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



    $("#addBlog").submit(function(e) {
        e.preventDefault();
        for(var instanceName in CKEDITOR.instances){
            CKEDITOR.instances[instanceName].updateElement();
        }
        $.ajax({
            url: "{{ route('blog.add') }}",
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
                    title: 'Blog Upload successfully'
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
