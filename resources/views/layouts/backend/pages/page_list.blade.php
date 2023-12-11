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
                            margin-bottom: 0px;">Add Page
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
                        <h3 class="card-title" id="cardTitle-add">Add New Page</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Page</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" id="addPage">
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
                                    <th class="sorting_asc">
                                        SL.No#
                                    </th>
                                    <th class="sorting_asc">
                                        Title Bangla
                                    </th>
                                    <th class="sorting_asc">
                                        Title English
                                    </th>
                                    <th class="sorting">
                                        Description(English)
                                    </th>
                                    <th class="sorting">
                                        Description(Bangla)
                                    </th>
                                    <th class="sorting">
                                        Status
                                    </th>
                                    <th class="sorting">
                                        Position
                                    </th>
                                    <th class="sorting">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($pages as $page)
                                @php
                                    $i++;
                                @endphp
                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                        {{ $i }}
                                    </td>
                                    <td class="sorting_1">
                                        {{ optional($page)->title_bn }}
                                    </td>
                                    <td class="sorting_1">
                                        {{ optional($page)->title_en }}
                                    </td>
                                    <td class="sorting_1">
                                        {{ Str::limit(optional($page)->description_en, 150, '...') }}
                                    </td>
                                    <td class="sorting_1">
                                        {{ Str::limit(optional($page)->description_bn, 150, '...') }}
                                    </td>
                                    <td>
                                        @if ($page->status == null)
                                            <span style="cursor: pointer;" onclick="changeStatus({{ $page->id }})" class="badge badge-danger">Inactive</span>
                                        @else
                                            <span style="cursor: pointer;" onclick="changeStatus({{ $page->id }})" class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">{{optional($page)->position}}</span>
                                    </td>
                                    <td style="display: inline-flex;">
                                        <a style="margin-right: 5px;" href="{{ url('/admin/page-show/'.$page->slug_en) }}"
                                            class="btn btn-primary btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-xs" onclick="deletePage({{ $page->id }})">
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

        function addCateForm(){
            $("#catTable").css({'display':'none'});
            $("#addCl").css({'display':'block'});
        }

        function changeStatus(id){
            $.ajax({
                url: "{{ route('change.page.status') }}",
                method: "POST",
                data:{
                    '_token':"{{ csrf_token() }}",
                    id:id
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Page active successfully'
                    })

                },
                error: function(res) {
                    if (res.status == 401) {
                        window.location.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Page de-active successfully'
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

        function deletePage(id){
            $.ajax({
                url: "{{ url('admin/page-delete') }}",
                type: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    id: id,
                },
                success: function(response) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Page delete successfully'
                    })
                }
            });
        }

        function closeForm() {
            $("#catTable").css({'display':'block'});
            $("#addCl").css({'display':'none'});
        }

        $("#addPage").submit(function(e) {
            e.preventDefault();
            for(var instanceName in CKEDITOR.instances){
                CKEDITOR.instances[instanceName].updateElement();
            }
            $.ajax({
                url: "{{ route('page.add') }}",
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
                        title: 'Page Upload successfully'
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
