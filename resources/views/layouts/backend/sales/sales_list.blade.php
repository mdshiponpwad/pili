@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">

                <div class="card col-12" id="catTable">
                    <div class="card-header">
                        <h3 class="card-title">Sales List is here</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        Name
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Product Name
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Qty
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Weight
                                    </th>
                                    <th class="sorting" style="width: 204px;">
                                        Price
                                    </th>
                                    <th class="sorting" style="width: 204px;">
                                        Profit
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Total
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Status
                                    </th>
                                    <th class="sorting" style="width: 99px;">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $sale)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ optional($sale->get_user)->name_en }}</td>
                                    <td class="sorting_1">
                                        {{ optional($sale->get_product)->product_name_en }}
                                    </td>
                                    <td class="sorting_1">{{ optional($sale)->qty }}</td>
                                    <td class="sorting_1">
                                        {{ optional($sale)->weight_en }}
                                    </td>
                                    <td>
                                        {{ optional($sale)->price }}
                                    </td>
                                    <td>
                                        {{ optional($sale)->profit }}
                                    </td>
                                    <td>
                                        {{ optional($sale)->total }}
                                    </td>
                                    <td>
                                        status
                                    </td>
                                    <td style="display: inline-flex;">
                                        <button class="btn btn-danger btn-xs" onclick="deleteCat({{ $sale->id }})">
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


        function deleteCat(id){
            $.ajax({
                url: "{{ url('admin/sales-delete') }}",
                type: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    id: id,
                },
                success: function(response) {
                   location.reload(true);
                    Toast.fire({
                        icon: 'success',
                        title: 'Delete successfully'
                    })
                }
            });
        }
    </script>
@endsection
@endsection
