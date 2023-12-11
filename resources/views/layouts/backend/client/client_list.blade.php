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
                            margin-bottom: 0px;">Add Client
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
                        <h3 class="card-title" id="cardTitle-add">Add New Client</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Client</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" id="addClient">
                        @csrf
                        <h3>Left Side</h3>
                        <div class="card-body" style="position: relative">
                            <input type="text" id="id" name="id" hidden>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (Bangla)</label>
                                    <input id="left_name_bn" name="left_name_bn" type="text" class="form-control"
                                        placeholder="নাম লিখুন" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (English)</label>
                                    <input id="left_name_en" name="left_name_en" type="text" class="form-control"
                                        placeholder="Enter name" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (Bangla)</label>
                                    <input id="left_company_bn" name="left_company_bn" type="text" class="form-control"
                                        placeholder="কোম্পানির নাম" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (English)</label>
                                    <input id="left_company_en" name="left_company_en" type="text" class="form-control"
                                        placeholder="Enter comapny name" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (Bangla)</label>
                                    <input id="left_desig_bn" name="left_desig_bn" type="text" class="form-control"
                                        placeholder="পদবি লিখুন" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (English)</label>
                                    <input id="left_desig_en" name="left_desig_en" type="text" class="form-control"
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
                                        <img src="" id="left_cover-img" style="height: 100px;
                                          width: 100% !important;
                                          cursor: pointer;margin-top: -134px;" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mr-sm-2">Client Speech(English)</label>
                                <textarea type="text" name="left_description_e"
                                class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Client Speech(Bangla)</label>
                                <textarea name="left_description_b" type="text"
                                    class="form-control"></textarea>
                            </div>

                        </div>
                        </hr>
                            <h3>Right Side</h3>
                        </ht>
                        
                        <div class="card-body" style="position: relative">
                            <input type="text" id="id" name="id" hidden>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (Bangla)</label>
                                    <input id="right_name_bn" name="right_name_bn" type="text" class="form-control"
                                        placeholder="নাম লিখুন" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Client Name (English)</label>
                                    <input id="right_name_en" name="right_name_en" type="text" class="form-control"
                                        placeholder="Enter name" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (Bangla)</label>
                                    <input id="right_company_bn" name="right_company_bn" type="text" class="form-control"
                                        placeholder="কোম্পানির নাম" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Company Name (English)</label>
                                    <input id="right_company_en" name="right_company_en" type="text" class="form-control"
                                        placeholder="Enter comapny name" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (Bangla)</label>
                                    <input id="right_desig_bn" name="right_desig_bn" type="text" class="form-control"
                                        placeholder="পদবি লিখুন" />

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Designation (English)</label>
                                    <input id="right_desig_en" name="right_desig_en" type="text" class="form-control"
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
                                        <img src="" id="right_cover-img" style="height: 100px;
                                          width: 100% !important;
                                          cursor: pointer;margin-top: -134px;" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mr-sm-2">Client Speech(English)</label>
                                <textarea type="text" name="right_description_e"
                                class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2">Client Speech(Bangla)</label>
                                <textarea name="right_description_b" type="text"
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
                                        Client Name Bangla
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Client Name English
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Logo
                                    </th>
                                    <th class="sorting" style="width: 204px;">
                                        Client Image
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Speech(English)
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Speech(Bangla)
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
                                    @foreach ($clients as $client)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            {{ $i }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($client)->left_name_en }}
                                            <span class="badge badge-success">{{ optional($client)->left_company_en }}</span><br/>    
                                            <span class="badge badge-success">{{ optional($client)->left_desig_en }}</span>
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($client)->name_bn }}
                                            <span class="badge badge-success">{{ optional($client)->left_company_bn }}</span><br/>
                                            <span class="badge badge-success">{{ optional($client)->left_desig_bn }}</span>
                                        </td>
                                        <td class="sorting_1">
                                            <img style="width: 100%;
                                            height: 39px;" src="{{ asset('/images/'.optional($client)->left_logo) }}" alt="">
                                        </td>
                                        <td class="sorting_1">
                                            <img style="width: 100%;
                                            height: 39px;" src="{{ asset('/images/'.optional($client)->left_cover) }}" alt="">
                                        </td>
                                        <td>
                                            {{ Str::limit(optional($client)->left_description_en, 50, '...') }}
                                        </td>
                                        <td>
                                            {{ Str::limit(optional($client)->left_description_bn, 50, '...') }}
                                        </td>
                                        <td style="display: inline-flex;">
                                            <a style="margin-right: 5px;" href="{{ route('show.client',$client->id) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger" onclick="deleteClient({{ $client->id }})">
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


    CKEDITOR.replace( 'description_e' );
    CKEDITOR.replace( 'description_b' );
</script>
    <script>

        function deleteClient(id){
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
                    title: 'Client delete successfully'
                })
            }
        });
        }

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
            $("#catTable").css({'display':'none'});
            $("#addCl").css({'display':'block'});
        }



        function closeForm() {
            $("#catTable").css({'display':'block'});
            $("#addCl").css({'display':'none'});
        }

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

        // function logoUrl(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $('#logo-img').attr('src', e.target.result);
        //         }

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        // $("#logo").change(function() {
        //     logoUrl(this);
        // });



    $("#addClient").submit(function(e) {
        e.preventDefault();
        // for(var instanceName in CKEDITOR.instances){
        //     CKEDITOR.instances[instanceName].updateElement();
        // }
        $.ajax({
            url: "{{ route('client.add') }}",
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
                    title: 'Client Upload successfully'
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
