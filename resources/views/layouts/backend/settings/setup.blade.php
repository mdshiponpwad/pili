@extends('layouts.backend.app')

@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="settingsUpdate">
                    @csrf
                    <input name="id" hidden type="text" hidden value="{{ optional($setting)->id }}" class="form-control" placeholder="Enter Email" />
                    <div style="float: left" class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Setup Basic Info</h3>
                            </div>
                            <div class="card-body">

                                <div class="col-md-6" style="float: left; padding-left: 0">
                                    <div class="form-group">
                                        <label>Website Title(English) *</label>
                                        <input name="title_en" type="text" value="{{ optional($setting)->title_en }}" class="form-control" placeholder="Enter website title" />
                                    </div>
                                    <div class="form-group">
                                        <label>Website Title(Bangla) *</label>
                                        <input name="title_bn" type="text" value="{{ optional($setting)->title_bn }}" class="form-control" placeholder="Enter website title" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No.(English) *</label>
                                        <input name="contact_en" value="{{ optional($setting)->contact_en }}" type="text" class="form-control" placeholder=" Enter contact number" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No.(Bangla) *</label>
                                        <input name="contact_bn" value="{{ optional($setting)->contact_bn }}" type="text" class="form-control" placeholder=" Enter contact number" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="{{ optional($setting)->email }}" type="email" class="form-control" placeholder="Enter Email" />
                                    </div>
                                </div>

                                <div class="col-md-6" style="float: right; padding-right:0px !important">
                                    <div class="form-group">
                                        <label for="logo">Logo *</label>
                                        <div style="height: 7.7rem; border: dashed 1.5px blue;
                                        background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                        width: 50% !important; cursor: pointer;">
                                        <input id="image" type="file" class="form-control" name="logo" style="opacity: 0; height: 7.7rem; cursor: pointer; padding: 0px;">
                                        <img src="{{ asset('/images/'.optional($setting)->logo) }}" id="image-img" style="height: 7.7rem; width: 100% !important; cursor: pointer;margin-top: -154px;" />
                                    </div>
                                    {{-- <input style="display:none;border: none; width: 75%; background-color:#f15353; color: #fff;
                                    font-size: 10px;margin-top:2px;" type="text" id="imageError" name="imageError" readonly> --}}
                                </div>
                                <div class="form-group">
                                    <label>Address(English)</label>
                                    <textarea name="address_en" type="text" class="form-control" placeholder="Enter Address">{{ optional($setting)->address_en }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Address(Bangla)</label>
                                    <textarea name="address_bn" type="text" class="form-control" placeholder="Enter Address">{{ optional($setting)->address_bn }}</textarea>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label style="width: 100%">Website Description(English)</label>
                                    <textarea name="des_en" type="text" class="form-control" placeholder="Enter description">{{ optional($setting)->description_en }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Website Description(Bangla)</label>
                                    <textarea name="des_bn" type="text" class="form-control" placeholder="Enter description">{{ optional($setting)->description_bn }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="float: right" class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Social Link</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input value="{{ optional($setting)->fb_link }}" name="fb_link" type="text" class="form-control" placeholder="Facebook link" />
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input value="{{ optional($setting)->twitt_link }}" name="twitt_link" type="text" class="form-control" placeholder="Twitter link" />
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input value="{{ optional($setting)->insta_link }}" name="insta_link" type="text" class="form-control" placeholder="Instagram link" />
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input value="{{ optional($setting)->tube_link }}" name="tube_link" type="text" class="form-control" placeholder="Youtube link" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 100%">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- /.content -->
  </div>

@section('js')
<script>
    $("#settingsUpdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('settings.save') }}",
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
                    icon:"success",
                    title:"Setting upload successfull."
                });
            }
        })
    })


    function imageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#image").change(function() {
        imageUrl(this);
    });


</script>

@endsection
@endsection
