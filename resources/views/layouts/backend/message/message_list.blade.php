@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">

        <section class="content">
            <div class="row">
                <div class="card col-12" id="catTable">
                    <div class="card-header">
                        <h3 class="card-title">All Message is here</h3>
                        <div style="float: right">
                            <a href="{{ route('english') }}" class="badge badge-success">English</a>
                            <a href="{{ route('bangla') }}" class="badge badge-info">Bangla</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        SL.No#
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Name
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Email
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Phone
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Subject
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Category/Weight/QTY
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Message
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
                                    @foreach ($messages as $msg)
                                    @if(Session::get('lang') == 'english')
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            {{ $i }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->name_en }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->email }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->phn_en }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->subject_en }}
                                        </td>
                                        <td class="sorting_1">
                                            <span>{{ optional($msg)->cat_name }}</span>
                                            <span class="badge badge-warning">{{ optional($msg)->weight }}</span>
                                            <span class="badge badge-info">{{ optional($msg)->qty }}</span>
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->msg_en }}
                                        </td>
                                        <td style="display: inline-flex;">
                                            <button class="btn btn-danger" onclick="deleteImage({{ $msg->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @else
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            {{ $i }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->name_bn }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->email }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->phn_bn }}
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->subject_bn }}
                                        </td>
                                        <td class="sorting_1">
                                            <span>{{ optional($msg)->cat_name }}</span>
                                            <span class="badge badge-warning">{{ optional($msg)->weight }}</span>
                                            <span class="badge badge-info">{{ optional($msg)->qty }}</span>
                                        </td>
                                        <td class="sorting_1">
                                            {{ optional($msg)->msg_bn }}
                                        </td>
                                        <td style="display: inline-flex;">
                                            <button class="btn btn-danger" onclick="deleteImage({{ $msg->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
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
        function deleteImage(id){
            $.ajax({
                url: "{{ url('admin/message/delete') }}/"+id,
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
