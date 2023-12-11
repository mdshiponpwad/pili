@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="card">
                <div class="card-header">
                    Update Site Meta
                </div>
                <div class="overlay" style="background-color: #ddd !important;text-align:center;display:none">
                    <i class="fas fa-2x fa-sync fa-spin" style="margin-top: 17%;"></i>
                </div>
                <div class="card-body" style="position:relative;">
                    <form id="updateMeta">
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Select Page</label>
                                    <select class="form-control" value="{{optional($item)->page_name}}" name="page_name" style="width: 100%;">
                                        @if($item->page_name == 1)
                                            <option selected="selected" value="1" hidden>Home</option>
                                        @elseif($item->page_name == 2)
                                            <option selected="selected" value="2" hidden>Category wise product</option>
                                        @elseif($item->page_name == 3)
                                            <option selected="selected" value="3" hidden>Product Details</option>
                                        @elseif($item->page_name == 4)
                                            <option selected="selected" value="4" hidden>Gallery</option>
                                        @elseif($item->page_name == 5)
                                            <option selected="selected" value="5" hidden>Job</option>
                                        @elseif($item->page_name == 8)
                                            <option selected="selected" value="8" hidden>All blog</option>
                                        @elseif($item->page_name == 9)
                                            <option selected="selected" value="9" hidden>Blog details</option>
                                        @elseif($item->page_name == 10)
                                            <option selected="selected" value="10" hidden>All CSR</option>
                                        @elseif($item->page_name == 11)
                                            <option selected="selected" value="11" hidden>CSR details</option>
                                        @elseif($item->page_name == 12)
                                            <option selected="selected" value="12" hidden>Contact Us</option>
                                        @elseif($item->page_name == 13)
                                            <option selected="selected" value="13" hidden>Login or Registration</option>
                                        @endif
                                        <option value="1">Home</option>
                                        <option value="2">Category wise product</option>
                                        <option value="3">Product Details</option>
                                        <option value="4">Gallery</option>
                                        <option value="5">Job</option>
                                        <option value="8">All blog</option>
                                        <option value="9">Blog details</option>
                                        <option value="10">All CSR</option>
                                        <option value="11">CSR details</option>
                                        <option value="12">Contact Us</option>
                                        <option value="13">Login or Registration</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Title (English)</label>
                                    <input type="text" name="title_en" value="{{optional($item)->title_en}}" class="form-control" placeholder="Enter title english">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Title (Bangla)</label>
                                    <input type="text" name="title_bn" class="form-control" value="{{optional($item)->title_bn}}" placeholder="Enter title bangla">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Name (English)</label>
                                    <input type="text" class="form-control" name="meta_name_en" value="{{optional($item)->meta_name_en}}" placeholder="Enter meta name english">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Name (Bangla)</label>
                                    <input type="text" class="form-control" name="meta_name_bn" value="{{optional($item)->meta_name_bn}}" placeholder="Enter meta name bangla">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Description (English)</label>
                                    <textarea class="form-control" name="meta_des_en" placeholder="Enter meta description english">{{optional($item)->meta_des_en}}</textarea>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Meta Description (Bangla)</label>
                                    <textarea class="form-control" name="meta_des_bn" placeholder="Enter meta description bangla">{{optional($item)->meta_des_bn}}</textarea>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="100%">
                                      <button type="button" onclick="editMeta()" style="width: 100%;margin-top: 42px;" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@section('js')

<script type="text/javascript">

    function editMeta() {
        $(".overlay").css({
            'display':'block'
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('meta.update') }}",
            method: "POST",
            data: new FormData(document.getElementById("updateMeta")),
            enctype: 'form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Data update successfully'
                })
                $(".overlay").css({
                    'display':'none'
                })
                window.location.href = "/admin/site-meta-list"
            }
        })
    };

</script>

@endsection
@endsection