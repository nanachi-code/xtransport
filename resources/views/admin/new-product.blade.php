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

{{-- START - Content --}}
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
                                        <label for="form-product-company">Company</label>
                                        <select class="form-control" id="form-product-company" name="company_id">
                                            <option value="">
                                                Select company
                                            </option>
                                            @if (count($allCompany)>0)
                                            @foreach ($allCompany as $company)
                                            <option value="{{ $company->id }}">
                                                {{ $company->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    {{-- product gallery --}}
                                    <div class="form-group">
                                        <label for="form-product-gallery">Gallery</label>
                                        <div id="gallery-preview">
                                            <button class="btn btn-primary" id="set-gallery">Select image</button>
                                            <input type="hidden" name="gallery">
                                            <div class="row pt-2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-product-thumbnail">Thumbnail</label>
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="thumbnail-preview">

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-thumbnail">Set thumbnail</button>
                                            <input type="hidden" name="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- START - Set Thumbnail Modal --}}
                        <div id="set-thumbnail-modal" aria-hidden="true" aria-labelledby="set-thumbnail-modal-title"
                            class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="set-thumbnail-modal-title">
                                            Set thumbnail
                                        </h5>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- START - Upload Attachment --}}
                                        <div class="element-box">
                                            <h5>Upload new attachment</h5>
                                            <hr>
                                            <form class="upload-gallery" action="{{ url("admin/gallery/upload") }}"
                                                method="post" enctype="multipart/form-data">
                                                <input type="file" data-title="Upload" name="image">
                                            </form>
                                        </div>
                                        {{-- END - Upload Attachment --}}

                                        {{-- START - Attachment Library --}}
                                        <div class="element-box attachment-library">
                                            <h5>Attachment Library</h5>
                                            <hr>
                                            @if (count($gallery) == 0)
                                            No attachments found.
                                            @else
                                            <div class="row gallery-list">
                                                @foreach ($gallery as $image)
                                                <div class="col-sm-2 gallery-item">
                                                    <img src="{{ $image->getRelativePathname() }}"
                                                        data-size="{{ $image->size }} B"
                                                        data-filename="{{ $image->getFilename() }}"
                                                        class="img-responsive">
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        {{-- END - Attachment Library --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button id="remove-thumbnail" class="btn btn-danger text-white">
                                            Remove thumbnail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END - Set Thumbnail Modal --}}

                        {{-- START - Set Gallery Modal --}}
                        <div id="set-gallery-modal" aria-hidden="true" aria-labelledby="set-gallery-modal-title"
                            class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="set-gallery-modal-title">
                                            Set gallery
                                        </h5>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- START - Upload Attachment --}}
                                        <div class="element-box">
                                            <h5>Upload new attachment</h5>
                                            <hr>
                                            <form class="upload-gallery" action="{{ url("admin/gallery/upload") }}"
                                                method="post" enctype="multipart/form-data">
                                                <input type="file" data-title="Upload" name="image">
                                            </form>
                                        </div>
                                        {{-- END - Upload Attachment --}}

                                        {{-- START - Attachment Library --}}
                                        <div class="element-box attachment-library">
                                            <h5>Attachment Library</h5>
                                            <hr>
                                            @if (count($gallery) == 0)
                                            No attachments found.
                                            @else
                                            <div class="row gallery-list">
                                                @foreach ($gallery as $image)
                                                <div class="col-sm-2 gallery-item">
                                                    <img src="{{ $image->getRelativePathname() }}"
                                                        data-size="{{ $image->size }} B"
                                                        data-filename="{{ $image->getFilename() }}"
                                                        class="img-responsive">
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        {{-- END - Attachment Library --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button id="confirm-gallery" class="btn btn-primary text-white">
                                            Confirm
                                        </button>
                                        <button id="reset-gallery" class="btn btn-danger text-white">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END - Set Gallery Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/product.js") }}"></script>
@endsection
