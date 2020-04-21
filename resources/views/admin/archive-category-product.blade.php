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
</ul>
{{-- END - Breadcrumbs --}}

{{-- START - Content --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3>Product category</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Create new category</h5>
                                <hr>
                                <form action="{{ url("/admin/category-product/new") }}" method="POST"
                                    id="form-category">
                                    {{-- category name --}}
                                    <div class="form-group">
                                        <label for="form-category-name">Name</label>
                                        <input class="form-control" data-error="Category name is required"
                                            placeholder="Enter category name" required="required" type="text"
                                            name="name" id="form-category-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="table-responsive">
                                    <table id="table-admin-category" class="table table-striped table-lightfont">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="row-actions">
                                                    <a href="{{ url("/admin/category-product/{$category->id}")}}">
                                                        <i class="os-icon os-icon-ui-49"></i>
                                                    </a>
                                                    <a href="{{ url("admin/category-product/{$category->id}/delete")}}"
                                                        class="danger dt-delete">
                                                        <i class="os-icon os-icon-ui-15"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection
