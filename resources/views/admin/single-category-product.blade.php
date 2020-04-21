@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/product') }}">Product</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/category-product') }}">Product category</a>
    </li>
    <li class="breadcrumb-item">
        Edit category
    </li>
</ul>
{{-- END - Breadcrumbs --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-6">
                <div class="element-wrapper">
                    <div class="element-header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3>Category</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Edit category</h5>
                        <hr>
                        <form id="form-category" action="{{ url("admin/category-product/{$category->id}/update")}}"
                            method="POST">
                            {{-- category name --}}
                            <div class="form-group">
                                <label for="form-category-name">Name</label>
                                <input class="form-control" data-error="category name is required"
                                    placeholder="Enter category name" required="required" type="text" name="name"
                                    value="{{ $category->name }}" id="form-category-name" />
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>

                            <div class="form-buttons-w">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="{{ url("admin/category-product/{$category->id}/delete")}}"
                                    class="btn btn-danger single-delete">
                                    Delete
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
