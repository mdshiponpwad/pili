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
                        <a href="{{ route('categories') }}" style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-undo"
                            style="margin-right: 5px;"></i>
                        </a>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Add Category
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div id="addCat" class="card card-primary col-md-12" style="
                    padding-top: 8px;
                ">
                <div class="card-header" id="cardHeader" style="background-color: #28a745;
                color: #fff;">
                    <h3 class="card-title" id="cardTitle-add">Add New Category</h3>
                    <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Category</h3>
                    <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="edit">
                    @csrf
                    <div class="card-body" style="position: relative">
                        <input type="text" id="id" name="id" hidden>
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Select Menu</label
                            >
                            <select class="form-control" name="menu_id" id="menu_id">
                                <option value="{{ $cat->menu_id }}" selected="selected" hidden>{{ $cat->get_menu->menu_en }}</option>
                                @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">
                                    {{ $menu->menu_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name Bangla</label>
                                <input id="cat_name_bn" name="cat_name_bn" value="{{ $cat->cat_name_bn }}" type="text" class="form-control"
                                    placeholder="কেটেগরি নাম লিখুন" />
                                <p id="catError" style="display: none;background-color: #e68888;
                                color: #fff;
                                margin-top: 2px;
                                font-size: 12px;
                                width: 56%;">Category field is required.</p>
                                <p id="uniqueError" style="display: none;background-color: #e68888;
                                color: #fff;
                                margin-top: 2px;
                                font-size: 12px;
                                width: 64%;">Category name has already been taken.</p>

                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name English</label>
                                <input id="cat_name_en" value="{{ $cat->cat_name_en }}" name="cat_name_en" type="text" class="form-control"
                                    placeholder="Enter category name" />
                                <p id="catError" style="display: none;background-color: #e68888;
                                color: #fff;
                                margin-top: 2px;
                                font-size: 12px;
                                width: 56%;">Category field is required.</p>
                                <p id="uniqueError" style="display: none;background-color: #e68888;
                                color: #fff;
                                margin-top: 2px;
                                font-size: 12px;
                                width: 64%;">Category name has already been taken.</p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image" class="col-form-label">Cover Photo</label>
                                <div style="height: 100px;
                                    border: dashed 1.5px blue;
                                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                    width: 50% !important;
                                    cursor: pointer;">
                                    <input style="opacity: 0;
                                    height: 100px;
                                    cursor: pointer;
                                    padding: 0px;" id="cover" type="file" class="form-control" name="cover">
                                    <img src="{{ asset('/images/'.$cat->cover) }}" id="cover-img" style="height: 100px;
                                    width: 100% !important;
                                    cursor: pointer;margin-top: -134px;" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect"
                                    >Position</label
                                >
                                <select class="form-control" name="position" id="position">
                                    <option value="{{ $cat->position }}" selected="selected" hidden>{{ $cat->position }}</option>
                                    <option value="best_feature">Best Features</option>
                                    <option value="popular_product">Popular Products</option>
                                    <option value="just_for_you">Just For You</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Description(English)</label>
                            <textarea id="description_en" type="text" name="description_en"
                            class="form-control" placeholder="Enter description in english language">
                            {{ $cat->description_en }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2">Description(Bangla)</label>
                            <textarea id="description_bn" name="description_bn" type="text"
                                class="form-control" placeholder="Enter description in bangla language">
                                {{ $cat->description_bn }}
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $cat->id }}">
                </form>
                <button id="submit" style="width: 100%;margin-bottom: 7px;" onclick="updateCategory()" class="btn btn-success">
                    Submit
                </button>
            </div>
        </div>
    </section>

</div>
@section('js')
<script>

    function updateCategory() {
    for(var instanceName in CKEDITOR.instances){
      CKEDITOR.instances[instanceName].updateElement();
    }
        $.ajax({
            url: "{{ route('category.update') }}",
            method: "POST",
            data: new FormData(document.getElementById("edit")),
            enctype: 'multipart/form-data',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                // window.location.href='/admin/categories';
                Toast.fire({
                    icon: 'success',
                    title: 'Category update successfully'
                })
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    };
</script>

@endsection
@endsection
