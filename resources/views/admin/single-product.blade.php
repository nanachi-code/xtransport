@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/product/all') }}">All Posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/product/{$product->id}") }}">{{ $product->name }}</a>
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
                        <h5>Edit product</h5>
                        <hr>
                        <form id="form-product" action="{{ url("admin/product/{$product->id}/update")}}"
                            method="product" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- product name --}}
                                    <div class="form-group">
                                        <label for="form-product-name">Name</label>
                                        <input class="form-control" data-error="product name is required"
                                            placeholder="Enter product name" required="required" type="text" name="name"
                                            value="{{ $product->name }}" id="form-product-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- product desc --}}
                                    <div class="form-group">
                                        <label for="form-product-desc">Description</label>
                                        <textarea class="form-control" rows="3" id="form-product-desc"
                                            name="description"
                                            placeholder="Enter product description">{{$product->description}}</textarea>
                                    </div>

                                    {{-- product category --}}
                                    <div class="form-group">
                                        <label for="form-product-category">Category</label>
                                        <select class="form-control" id="form-product-category"
                                                name="category_product_id">
                                            <option value="" @if (!$product->category_product_id) selected @endif>
                                                Uncategorized
                                            </option>
                                            @foreach ($allCategories as $category)
                                                <option value="{{ $category->id }}" @if ($product->category_product_id ==
                                                $category->id) selected @endif>
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
                                            <option value="" @if (!$product->company_id) selected @endif>
                                                Uncategorized
                                            </option>
                                            @foreach ($allCompany as $company)
                                                <option value="{{ $company->id }}" @if ($product->company_id ==
                                                $company->id) selected @endif>
                                                    {{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($product->status == "publish")
                                        <a href="{{ url("admin/product/{$product->id}/delete")}}"
                                            class="btn btn-danger single-delete">
                                            Delete
                                        </a>
                                        @else
                                        <a href="{{ url("admin/product/{$product->id}/restore")}}"
                                            class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- product status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($product->status == "trashed")
                                            <span style="font-weight: 800">Trashed</span> at <span
                                                style="font-weight: 800">{{ $product->updated_at }}</span>
                                            @else
                                            <span style="font-weight: 800">Published</span> at <span
                                                style="font-weight: 800">{{ $product->updated_at }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-product-thumbnail">Thumbnail</label>
                                        @if ($product->thumbnail)
                                        <img src="{{ asset("uploads/{$product->thumbnail}") }}"
                                            class="input-preview img-responsive">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">
                                        @endif

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
