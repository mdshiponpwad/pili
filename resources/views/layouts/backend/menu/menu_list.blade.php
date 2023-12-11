
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
                            <button onclick="showAddMenuForm()" style="padding: 10px;" class="btn btn-primary">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Menu
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div id="addMenuDiv" class="card card-primary col-md-12"
                    style="
                        padding-top: 8px;
                        height: 470px;
                        display: none;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Menu</h3>
                        <button
                            onclick="closeForm()"
                            type="button"
                            class="close"
                        >
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="POST" action="{{ route('store.menu') }}">
                        @csrf
                        <div class="card-body" style="position: relative">
                            <div class="field_wrapper">
                                <div style="margin-bottom: 5px;">
                                    <input id="menu_en" style="width: 24%" placeholder="menu" name="menu_en[]" type="text" value=""/>
                                    <input id="menu_bn" style="width: 24%" placeholder="মেনু" type="text" name="menu_bn[]" value=""/>
                                    <input id="link" style="width: 48%;margin-right: 5px;" placeholder="link" type="text" name="link[]" value=""/>
                                    <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="width: 100%" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="col-md-12" id="menu_list">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menu List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Name(English)</th>
                                        <th>Name(Bangla)</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($menus as $menu)
                                    @php
                                        $i++;
                                    @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                <p id="menu_n{{$menu->id}}">{{ $menu->menu_en }}</p>
                                                <input id="menu_e{{$menu->id}}" type="text" style="display: none; width:100px" value="{{ $menu->menu_en }}">
                                            </td>
                                            <td>
                                                <p id="menu_b{{$menu->id}}">{{ $menu->menu_bn }}</p>
                                                <input id="menu_be{{$menu->id}}" type="text" style="display: none; width:100px" value="{{ $menu->menu_bn }}">
                                            </td>
                                            <td>
                                                <p id="link_n{{$menu->id}}">{{ $menu->link }}</p>
                                                <input id="link_e{{$menu->id}}" type="text" style="display: none; width:100px" value="{{ $menu->link }}">
                                            </td>
                                            <td>
                                                @if ($menu->status == 1)
                                                    <p onclick="menuStatus({{ $menu->id }})" style="cursor: pointer;" class="badge badge-success">Active</p>
                                                @else
                                                    <p onclick="menuStatus({{ $menu->id }})" style="cursor: pointer;" class="badge badge-warning">De-Active</p>
                                                @endif
                                            </td>
                                            <td>
                                                <button style="margin-right: 5px;" id="btn_n{{$menu->id}}" onclick="showId({{$menu->id}})" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button style="margin-right: 5px;display:none;" id="btn_e{{$menu->id}}" class="btn btn-success btn-sm" onclick="updateMenu({{$menu->id}})">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button style="margin-right: 5px;display:none;" id="btn_d_e{{$menu->id}}" class="btn btn-danger btn-sm" onclick="closeEdit({{$menu->id}})">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
</script>

<script type="text/javascript">
    function showId(id) {

        $('#menu_n'+id).hide();
        $('#menu_e'+id).show();
        $('#menu_b'+id).hide();
        $('#menu_be'+id).show();
        $('#btn_n'+id).hide();
        $('#btn_d_n'+id).hide();
        $('#btn_e'+id).show();
        $('#btn_d_e'+id).show();
    }

    function closeEdit(id){
        $('#menu_n'+id).show();
        $('#menu_e'+id).hide();
        $('#menu_b'+id).show();
        $('#menu_be'+id).hide();
        $('#btn_n'+id).show();
        $('#btn_d_n'+id).show();
        $('#btn_e'+id).hide();
        $('#btn_d_e'+id).hide();
    }

    function updateMenu(id){
        $.ajax({
            url: "{{ route('update.menu') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'id':id,
                "menu_en": $('#menu_e'+id).val(),
                "menu_bn": $('#menu_be'+id).val(),
                "link": $('#link_e'+id).val()
            },
            success: function(response) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Menu update successfully'
                });
            },
            error:function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    }

    function showAddMenuForm(){
        $("#menu_list").hide();
        $("#addMenuDiv").show();
    }

    function closeForm(){
        $("#menu_list").show();
        $("#addMenuDiv").hide();
    }

    $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div style="margin-bottom: 5px;"><input id="menu_en" placeholder="menu" style="width: 24%;margin-right: 4px;" type="text" name="menu_en[]" value=""/><input id="menu_bn" placeholder="মেনু" style="width: 24%;margin-right: 4px;" type="text" name="menu_bn[]" value=""/><input id="link" style="width: 48%;margin-right: 3px;" placeholder="link" type="text" name="link[]" value=""/><a href="javascript:void(0);" class="remove_button"><i style="margin-left: 5px;" class="fa fa-minus"/></a></div>';
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });


        function menuStatus(id){
            $.ajax({
            url: "{{ route('menu.status') }}",
            method: "POST",
            data:{
                '_token':"{{ csrf_token() }}",
                id:id
            },
            success: function(res) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Menu active successfully'
                })

            },
            error: function(res) {
                if (res.status == 401) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Menu de-active successfully'
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

</script>

@endsection
@endsection
