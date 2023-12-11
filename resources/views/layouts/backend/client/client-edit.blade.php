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
                    <h3 class="card-title" id="cardTitle-add">Add New Client</h3>
                    <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Category</h3>
                    <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="edit">
                    @csrf
                    <h3>Left Side</h3>
                    <div class="card-body" style="position: relative">
                        <input value="{{ optional($client)->id }}" type="hidden" id="id" name="id" hidden>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (Bangla)</label>
                                <input value="{{ optional($client)->left_name_bn }}" id="left_name_bn" name="left_name_bn" type="text" class="form-control"
                                    placeholder="নাম লিখুন" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (English)</label>
                                <input value="{{ optional($client)->left_name_en }}" id="left_name_en" name="left_name_en" type="text" class="form-control"
                                    placeholder="Enter name" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (Bangla)</label>
                                <input id="left_company_bn" name="left_company_bn" value="{{ optional($client)->left_company_bn }}" type="text" class="form-control"
                                    placeholder="কোম্পানির নাম" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (English)</label>
                                <input id="left_company_en" value="{{ optional($client)->left_company_en }}" name="left_company_en" type="text" class="form-control"
                                    placeholder="Enter comapny name" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (Bangla)</label>
                                <input value="{{ optional($client)->left_desig_bn }}" id="left_desig_bn" name="left_desig_bn" type="text" class="form-control"
                                    placeholder="পদবি লিখুন" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (English)</label>
                                <input value="{{ optional($client)->left_desig_en }}" id="left_desig_en" name="left_desig_en" type="text" class="form-control"
                                    placeholder="Enter designation name" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image" class="col-form-label">Client Image</label>
                                <div style="height: 100px;
                                    border: dashed 1.5px blue;
                                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                    width: 30% !important;
                                    cursor: pointer;">
                                    <input style="opacity: 0;
                                      height: 100px;
                                      cursor: pointer;
                                      padding: 0px;" id="left_cover" type="file" class="form-control" name="left_cover">
                                    <img src="{{ asset('/images/'.$client->left_cover) }}" id="left_cover-img" style="height: 100px;
                                      width: 100% !important;
                                      cursor: pointer;margin-top: -134px;" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Client Speech(English)</label>
                            <textarea type="text" name="left_description_en"
                            class="form-control">{{ optional($client)->left_description_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Client Speech(Bangla)</label>
                            <textarea name="left_description_bn" type="text"
                                class="form-control">{{ optional($client)->left_description_bn }}</textarea>
                        </div>

                    </div>
                    </hr>
                    <h3>Right Side</h3>
                    </hr>
                    <div class="card-body" style="position: relative">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (Bangla)</label>
                                <input value="{{ optional($client)->right_name_bn }}" id="right_name_bn" name="right_name_bn" type="text" class="form-control"
                                    placeholder="নাম লিখুন" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (English)</label>
                                <input value="{{ optional($client)->right_name_en }}" id="right_name_en" name="right_name_en" type="text" class="form-control"
                                    placeholder="Enter name" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (Bangla)</label>
                                <input id="right_company_bn" name="right_company_bn" value="{{ optional($client)->right_company_bn }}" type="text" class="form-control"
                                    placeholder="কোম্পানির নাম" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (English)</label>
                                <input id="right_company_en" value="{{ optional($client)->right_company_en }}" name="right_company_en" type="text" class="form-control"
                                    placeholder="Enter comapny name" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (Bangla)</label>
                                <input value="{{ optional($client)->right_desig_bn }}" id="right_desig_bn" name="right_desig_bn" type="text" class="form-control"
                                    placeholder="পদবি লিখুন" />

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (English)</label>
                                <input value="{{ optional($client)->right_desig_en }}" id="right_desig_en" name="right_desig_en" type="text" class="form-control"
                                    placeholder="Enter designation name" />

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image" class="col-form-label">Client Image</label>
                                <div style="height: 100px;
                                    border: dashed 1.5px blue;
                                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                    width: 30% !important;
                                    cursor: pointer;">
                                    <input style="opacity: 0;
                                      height: 100px;
                                      cursor: pointer;
                                      padding: 0px;" id="right_cover" type="file" class="form-control" name="right_cover">
                                    <img src="{{ asset('/images/'.$client->right_cover) }}" id="right_cover-img" style="height: 100px;
                                      width: 100% !important;
                                      cursor: pointer;margin-top: -134px;" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mr-sm-2">Client Speech(English)</label>
                            <textarea type="text" name="right_description_en"
                            class="form-control">{{ optional($client)->right_des_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Client Speech(Bangla)</label>
                            <textarea name="right_description_bn" type="text"
                                class="form-control">{{ optional($client)->right_des_bn }}</textarea>
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
    // CKEDITOR.replace( 'description_e' );
    // CKEDITOR.replace( 'description_b' );

    function updateCategory() {
    
        $.ajax({
            url: "{{ route('client.update') }}",
            method: "POST",
            data: new FormData(document.getElementById("edit")),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.href='/admin/clients';
                Toast.fire({
                    icon: 'success',
                    title: 'Client update successfully'
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

    function right_coverUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#right_cover-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#right_cover").change(function() {
        right_coverUrl(this);
    });
    
    function left_coverUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#left_cover-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#left_cover").change(function() {
        left_coverUrl(this);
    });

</script>

@endsection
@endsection
