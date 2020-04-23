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
                                <h3>Products</h3>
                            </div>
                            <div class="float-right">
                                <a class="btn-outline-primary btn" href="{{ url('admin/product/new') }}">New</a>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="table-admin-product" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Company</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if (!$product->categoryProduct)
                                            Uncategorized
                                            @else
                                            {{ $product->categoryProduct->name }}
                                            @endif
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            @if (!$product->company)
                                                Uncategorized
                                            @else
                                                {{ $product->company->name }}
                                            @endif
                                        </td>
                                        <td class="row-actions">
                                            <a href="{{ url("/admin/product/{$product->id}")}}">
                                                <i class="os-icon os-icon-ui-49"></i>
                                            </a>
                                            <a href="{{ url("admin/product/{$product->id}/delete")}}"
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
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Company</th>
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
{{-- END - Content --}}
@endsection
