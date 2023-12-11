@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <div id="disableDiv" style="width: 100%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <button style="padding: 10px;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-xl">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Menu
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-xl">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Website Meta</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="overlay" style="background-color: #ddd !important;text-align:center;display:none">
                                <i class="fas fa-2x fa-sync fa-spin" style="margin-top: 17%;"></i>
                            </div>
                            <form id="storeMeta">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Select Page</label>
                                            <select class="form-control" name="page_name" style="width: 100%;">
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
                                            <input type="text" name="title_en" class="form-control" placeholder="Enter title english">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Title (Bangla)</label>
                                            <input type="text" name="title_bn" class="form-control" placeholder="Enter title bangla">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Name (English)</label>
                                            <input type="text" class="form-control" name="meta_name_en" placeholder="Enter meta name english">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Name (Bangla)</label>
                                            <input type="text" class="form-control" name="meta_name_bn" placeholder="Enter meta name bangla">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Description (English)</label>
                                            <textarea class="form-control" name="meta_des_en" placeholder="Enter meta description english"></textarea>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Description (Bangla)</label>
                                            <textarea class="form-control" name="meta_des_bn" placeholder="Enter meta description bangla"></textarea>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="100%">
                                              <button type="button" onclick="addMeta()" style="width: 100%;margin-top: 42px;" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12" id="menu_list">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Meta List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Page Name</th>
                                        <th>Title</th>
                                        <th>Meta Name</th>
                                        <th>Meta Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($list as $item)
                                    @php
                                        $i++;
                                    @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                @if($item->page_name == 1)
                                                    Home
                                                @elseif($item->page_name == 2)
                                                    Category wise product
                                                @elseif($item->page_name == 3)
                                                    Product details
                                                @elseif($item->page_name == 4)
                                                    Gallery
                                                @elseif($item->page_name == 5)
                                                    Job
                                                @elseif($item->page_name == 8)
                                                    All blog
                                                @elseif($item->page_name == 9)
                                                    Blog details
                                                @elseif($item->page_name == 10)
                                                    All CSR
                                                @elseif($item->page_name == 11)
                                                    CSR details
                                                @elseif($item->page_name == 12)
                                                    Contact Us
                                                @elseif($item->page_name == 13)
                                                    Login or Registration
                                                @endif
                                            </td>
                                            <td>
                                                <p>English : {{ $item->title_en }}</p> </br>
                                                <p>Bangla : {{ $item->title_bn }}</p>
                                            </td>
                                            <td>
                                                <p>English : {{ $item->meta_name_en }}</p> </br>
                                                <p>Bangla : {{ $item->meta_name_bn }}</p>
                                            </td>
                                            <td>
                                                <p>English : {{ $item->meta_des_en }}</p> </br>
                                                <p>Bangla :{{ $item->meta_des_bn }}</p>
                                            </td>
                                            <td>
                                                <a style="margin-right: 5px;" href="{{ url('/admin/show-site-meta/'.$item->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

<script type="text/javascript">


    function addMeta() {
        $(".overlay").css({
            'display':'block'
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('meta.store') }}",
            method: "POST",
            data: new FormData(document.getElementById("storeMeta")),
            enctype: 'form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $("#modal-xl").modal('hide');
                Toast.fire({
                    icon: 'success',
                    title: 'Data save successfully'
                })
                $(".overlay").css({
                    'display':'none'
                })
                window.location.reload();
            }
        })
    };



</script>

@endsection
@endsection