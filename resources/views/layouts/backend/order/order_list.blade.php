@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">

        <section class="content">


            <div class="card col-12" id="catTable">
                <div class="card-header">
                    <h3 class="card-title">All Order is here</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" style="width: 166px;">
                                    SL.No#
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Order No.
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Total Quantity
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Status
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Sub Total
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Shipping Cost	
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Paid Amount	
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Grand Total	
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Due Amount
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
                            @foreach ($orders as $order)
                                @php
                                    $i++
                                @endphp
                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                        {{ $i }}
                                    </td>

                                    <td>{{ $order->order_no }}</td>
                                    <td>{{ $order->total_quantity }}</td>
                                    <td>
                                        @if ($order->status == "Pending")
                                            <p class="badge badge-warning" onclick="orderActive({{ $order->id }})">Pending</p>
                                        @else
                                            <p class="badge badge-success" onclick="orderDeactive({{ $order->id }})">Confirmed</p>
                                        @endif

                                    </td>
                                    <td>{{ $order->sub_total }}</td>
                                    <td>{{ $order->shipping_cost }}</td>
                                    <td>{{ $order->paid_amount }}</td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td>{{ $order->due_amount }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </section>

    </div>

@section('js')
<script>
    CKEDITOR.replace( 'description_en' );
    CKEDITOR.replace( 'description_bn' );
</script>
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

        function orderActive(id){
            $.ajax({
                url: "",
                method: "POST",
                data: {
                    '_token':"{{ csrf_token() }}",
                    id:id
                },
                success: function(response) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Order active successfully'
                    })
                },
                error: function(res) {
                    if (res.status == 401) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Order de-active successfully'
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
            $("#addCat").css({'display':'block'});
            $("#catTable").css({'display':'none'});
            $("#editCategory").css({'display':'none'});
            $("#addCategory").css({'display':'block'});
        }



        function closeForm() {
            $("#cardHeader").css({
                'color': '#fff',
                'background-color': '#007bff',
                'border-color': '#28a745',
                'box-shadow': 'none',
            });
            $("#cover-img").attr('src', "#");
            $('#id').val();
            $('#explor').val();
            $("#updateCategory").attr('id', 'addCategory');
            $("#update").hide();
            $("#submit").show();
            $("#cardTitle-add").show();
            $("#cardTitle-update").hide();
            $("#addCat").css({'display':'none'});
            $("#catTable").css({'display':'block'});
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

        $("#cover").change(function() {
            coverUrl(this);
        });



    $("#addCategory").submit(function(e) {
        e.preventDefault();
        for(var instanceName in CKEDITOR.instances){
            CKEDITOR.instances[instanceName].updateElement();
        }
        $.ajax({
            url: "{{ route('category.add') }}",
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
                    title: 'Category Upload successfully'
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
