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
                        <a href="{{ route('clients') }}" style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-undo"
                            style="margin-right: 5px;"></i>
                        </a>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Add Client
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
                ">
                <div class="card-header" id="cardHeader" style="background-color: #28a745;
                color: #fff;">
                    <h3 class="card-title" id="cardTitle-add">Update Blog</h3>
                    <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Category</h3>
                    <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="editBlog">
                    @csrf
                    <div class="card-body" style="position: relative">
                        <input value="{{ $blog->id }}" type="text" id="id" name="id" hidden>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Title (Bangla)</label>
                                <input value="{{ optional($blog)->title_bn }}" id="title_bn" name="title_bn" type="text" class="form-control"
                                    placeholder="টাইটেল লিখুন" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Title (English)</label>
                                <input value="{{ optional($blog)->title_en }}" id="title_en" name="title_en" type="text" class="form-control"
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
                                    <img src="{{ asset('/images/'.optional($blog)->image) }}" id="cover-img" style="height: 200px;
                                      width: 100% !important;
                                      cursor: pointer;margin-top: -231px;" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Description (English)</label>
                            <textarea id="description_en" type="text" name="description_en"
                            class="form-control">{{ optional($blog)->description_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Description (Bangla)</label>
                            <textarea id="description_bn" name="description_bn" type="text"
                                class="form-control">{{ optional($blog)->description_bn }}</textarea>
                        </div>

                    </div>
                </form>
                <button id="submit" style="width: 100%;margin-bottom: 7px;" onclick="updateCategory()" class="btn btn-success">
                    Submit
                </button>
            </div>
        </div>
    </section>

</div>
@section('js')
<script>
    CKEDITOR.replace( 'description_en' );
    CKEDITOR.replace( 'description_bn' );

    function updateCategory() {
    for(var instanceName in CKEDITOR.instances){
      CKEDITOR.instances[instanceName].updateElement();
    }
        $.ajax({
            url: "{{ route('blog.update') }}",
            method: "POST",
            data: new FormData(document.getElementById("editBlog")),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.href='/admin/blog';
                Toast.fire({
                    icon: 'success',
                    title: 'Blog update successfully'
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
</script>

@endsection
@endsection
