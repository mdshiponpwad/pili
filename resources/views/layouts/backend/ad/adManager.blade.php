@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div id="addCat" class="card card-primary col-4" style="margin-left: 15px;
                        padding-top: 8px;
                        display: block;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Ads</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" id="addCate">
                        @csrf
                        <img style="display: none;
                        position: absolute;
                        z-index: 9999;
                        background-color: #fff;
                        opacity: .8;
                        height: 318px;
                        width: 351px;" id="loading" src="#" alt="">

                        <div class="card-body" style="position: relative">
                            <input type="text" id="id" name="id" hidden>
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Ads link</label>
                                <input id="link" name="link" type="text" class="form-control"
                                    placeholder="Enter ads link" />

                            </div>
                            <div class="form-group">
                              <label for="image" class="col-form-label">Ads Image</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
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
                                  >View Position</label
                                >
                                <select class="form-control" name="position" id="position">
                                    <option value="" selected="selected" hidden>select Position</option>
                                    <option value="Home Page">Home Page</option>
                                    <option value="Job Page">Jop Page</option>
                                    <option value="Blog Page">Blog Page</option>
                                    <option value="CSR Page">CSR Page</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" style="width: 100%;margin-bottom: 10px;" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>

                <div id="editCat" class="card card-primary col-4" style="margin-left: 15px;
                        padding-top: 8px;
                        display: none;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Update Ads</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" id="editCate">
                        @csrf
                        <img style="display: none;
                        position: absolute;
                        z-index: 9999;
                        background-color: #fff;
                        opacity: .8;
                        height: 318px;
                        width: 351px;" id="loading" src="#" alt="">

                        <div class="card-body" style="position: relative">
                            <input type="hidden" id="ad_id" name="id" >
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Ads link</label>
                                <input id="edit_link" name="link" type="text" class="form-control"
                                    placeholder="Enter ads link" />

                            </div>
                            <div class="form-group">
                              <label for="image" class="col-form-label">Ads Image</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
                                  cursor: pointer;">
                                  <input style="opacity: 0;
                                    height: 100px;
                                    cursor: pointer;
                                    padding: 0px;" id="edit_cover" type="file" class="form-control" name="cover">
                                  <img src="" id="edit_cover-img" style="height: 100px;
                                    width: 100% !important;
                                    cursor: pointer;margin-top: -134px;" />
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect"
                                  >View Position</label
                                >
                                <select class="form-control" name="position">
                                    <option value="" selected="selected" hidden>select Position</option>
                                    <option value="Home Page">Home Page</option>
                                    <option value="Job Page">Jop Page</option>
                                    <option value="Blog Page">Blog Page</option>
                                    <option value="CSR Page">CSR Page</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" style="width: 100%;margin-bottom: 10px;" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>

                <div class="card col-7" style="margin-left: 70px;">
                    <div class="card-header">
                        <h3 class="card-title">All Ads is here</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        Link
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Ads Image
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
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
                                @foreach ($ads as $ad)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ optional($ad)->link }}</td>
                                        <td class="sorting_1">
                                        <img style="width: 100%;
                                        height: 39px;" src="{{ asset('/images/'.optional($ad)->image) }}" alt="">
                                        </td>
                                        <td class="sorting_1">
                                            <span class="badge badge-warning">{{ optional($ad)->position }}</span>
                                        </td>
                                        <td>
                                            @if ($ad->status == 1)
                                            <p style="cursor: pointer;" onclick="changeStatus({{ $ad->id }})" class="badge badge-success">Active</p>
                                            @else
                                            <p style="cursor: pointer;" onclick="changeStatus({{ $ad->id }})" class="badge badge-danger">In-active</p>
                                            @endif
                                        </td>
                                        <td style="display: inline-flex;">
                                            <button style="margin-right: 5px;" href="#"
                                                class="btn btn-primary" onclick="editCat({{ $ad }})">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger" onclick="deleteCat({{ $ad->id }})">
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
            "autoWidth": false,
        });
        });
        function editCat(ad) {
            $("#edit_cover-img").attr('src', "{{ asset('/images/') }}/" + ad.image);
            document.getElementById("addCat").style.display = "none";
            document.getElementById("editCat").style.display = "block";
            $("#edit_link").val(ad.link);
            $("#ad_id").val(ad.id);
        }
        function closeForm() {
            document.getElementById("addCat").style.display = "block";
            document.getElementById("editCat").style.display = "none";
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
        function edit_coverUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit_cover-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cover").change(function() {
            coverUrl(this);
        });

        $("#edit_cover").change(function() {
            edit_coverUrl(this);
        });

        $("#addCate").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('ads.store') }}",
                method: "POST",
                data: new FormData(document.getElementById("addCate")),
                enctype: 'multipart/form-data',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                   window.location.reload();
                   Toast.fire({
                       icon:'success',
                       title:'Ads upload successfull'
                   });
                },
                error: function() {
                    Swal.fire({
                        icon:'error',
                        title:'Field Required.'
                    })
                }
            })
        })

        $("#editCate").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('ads.update') }}",
                method: "POST",
                data: new FormData(document.getElementById("editCate")),
                enctype: 'multipart/form-data',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                   window.location.reload();
                   Toast.fire({
                       icon:'success',
                       title:'Ads update successfull'
                   });
                },
                error: function() {
                    Swal.fire({
                        icon:'error',
                        title:'Field Required.'
                    })
                }
            })
        })

        function changeStatus(id){
            $.ajax({
                url: "{{ route('change.ads.status') }}",
                method: "POST",
                data:{
                    "_token":"{{ csrf_token() }}",
                    id:id
                },
                success: function(response) {
                   window.location.reload();
                   Toast.fire({
                       icon:'success',
                       title:'Ads status updated successfull'
                   });
                },
                error: function() {
                    Swal.fire({
                        icon:'error',
                        title:'Field Required.'
                    })
                }
            })
        }
    </script>
@endsection
@endsection
