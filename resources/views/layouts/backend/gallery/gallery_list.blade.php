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
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Blog</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Client</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('gallery.add') }}" enctype="multipart/form-data" method="POST" class="dropzone">
                        @csrf
                        <div class="fallback">
                          <input name="file" type="file" multiple />
                        </div>
                      </form>
                </div>

                <div class="card col-12" id="catTable">
                    <div class="card-header">
                        <h3 class="card-title">All Galleries is here</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        SL.No#
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Image
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
                                    @foreach ($galleries as $gallery)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            {{ $i }}
                                        </td>
                                        <td class="sorting_1">
                                            <img style="height: 50px;width:60px;" src="{{ asset('/images/'.$gallery->image) }}" alt="">
                                        </td>
                                        <td style="display: inline-flex;">
                                            <button class="btn btn-danger" onclick="deleteImage({{ $gallery->id }})">
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
</script>
    <script type="text/javascript">
        Dropzone.options.dropzone=
        {
            maxFiles : 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 30000,
            accept: function (file, done) {
                window.location.reload();
                Toast.fire({
                    icon:'success',
                    title:"Image upload successfull."
                })
            },
            error: function (file, response) {
                return false;
            }
        };

        function deleteImage(id){
            $.ajax({
                url: "{{ url('admin/gallery/delete') }}/"+id,
                type: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    id: id,
                },
                success: function(response) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Image delete successfully'
                    })
                }
            });
        }

    </script>
@endsection
@endsection
