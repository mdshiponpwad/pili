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
                        <a href="{{ url('admin/pages') }}" style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-undo"
                            style="margin-right: 5px;"></i>
                        </a>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Add Page
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
                    <h3 class="card-title" id="cardTitle-add">Update Page</h3>
                    <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Page</h3>
                    <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="editPage">
                    @csrf
                    <div class="card-body" style="position: relative">
                        <input value="{{ $page->id }}" type="text" id="id" name="id" hidden>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Title (Bangla)</label>
                                <input value="{{ optional($page)->title_bn }}" id="title_bn" name="title_bn" type="text" class="form-control"
                                    placeholder="টাইটেল লিখুন" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Title (English)</label>
                                <input value="{{ optional($page)->title_en }}" id="title_en" name="title_en" type="text" class="form-control"
                                    placeholder="Enter title" />

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="banner-product" class="col-form-label">Select Position</label>
                            <select class="select2 form-control" name="position">
                                <option value="" selected="selected" hidden>Select view position</option>
                                    <option value="At a glance">At a glance</option>
                                    <option value="Company">Company</option>
                                    <option value="Social Media">Social Media</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Description (English)</label>
                            <textarea id="description_en" type="text" name="description_en"
                            class="form-control">{{ optional($page)->description_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Description (Bangla)</label>
                            <textarea id="description_bn" name="description_bn" type="text"
                                class="form-control">{{ optional($page)->description_bn }}</textarea>
                        </div>

                    </div>
                    <button id="submit" style="width: 100%;margin-bottom: 7px;" class="btn btn-success">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>

</div>
@section('js')
<script>
    CKEDITOR.replace( 'description_en' );
    CKEDITOR.replace( 'description_bn' );

    $("#editPage").on('submit',function(e){
        e.preventDefault();

        for(var instanceName in CKEDITOR.instances){
        CKEDITOR.instances[instanceName].updateElement();
        }
        $.ajax({
            url: "{{ route('page.update') }}",
            method: "POST",
            data: new FormData(this),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.href='/admin/pages';
                Toast.fire({
                    icon: 'success',
                    title: 'Page update successfully'
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
    })

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
