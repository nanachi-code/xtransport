@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/product/all') }}">All Products</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/product/new") }}">New Product</a>
    </li>
</ul>
{{-- END - Breadcrumbs --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3>Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Create new product</h5>
                        <hr>
                        <form id="form-create-product" action="{{ url("admin/product/new")}}" method="POST">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- product name --}}
                                    <div class="form-group">
                                        <label for="form-product-name">Name</label>
                                        <input class="form-control" data-error="Product name is required"
                                            placeholder="Enter product name" required="required" type="text" name="name"
                                            id="form-product-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- product desc --}}
                                    <div class="form-group">
                                        <label for="form-product-desc">Description</label>
                                        <textarea class="form-control" rows="3" id="form-product-desc"
                                            name="description" placeholder="Enter product description"></textarea>
                                    </div>
                                    {{-- product category --}}
                                    <div class="form-group">
                                        <label for="form-product-category">Category</label>
                                        <select class="form-control" id="form-product-category"
                                                name="category_product_id">
                                            <option value="">
                                                Uncategorized
                                            </option>
                                            @foreach ($allCategories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- product company --}}
                                    <div class="form-group">
                                        <label for="form-product-category">Company</label>
                                        <select class="form-control" id="form-product-company"
                                                name="company_id">
                                            <option value="">
                                                Uncategorized
                                            </option>
                                            @foreach ($allCompany as $company)
                                                <option value="{{ $company->id }}">
                                                    {{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-product-thumbnail">Thumbnail</label>
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">
                                        <div class="form-buttons-w">
                                            <input type="file" class="form-control-file" data-title="Upload"
                                                name="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
