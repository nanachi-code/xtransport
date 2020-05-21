@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/company/all') }}">All Companies</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/company/{$company->id}") }}">{{ $company->name }}</a>
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
                                <h3>Company</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Edit company</h5>
                        <hr>
                        <form id="form-single-company" action="{{ url("admin/company/{$company->id}/update")}}"
                            method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- company name --}}
                                    <div class="form-group">
                                        <label for="form-company-name">Name</label>
                                        <input class="form-control" data-error="company name is required"
                                            placeholder="Enter company name" required="required" type="text" name="name"
                                            value="{{ $company->name }}" id="form-company-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company email --}}
                                    <div class="form-group">
                                        <label for="form-company-email">Email</label>
                                        <input class="form-control" data-error="company email is required" type="email"
                                            name="email" value="{{ $company->email }}" id="form-company-email" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company phone --}}
                                    <div class="form-group">
                                        <label for="form-company-price">Phone</label>
                                        <input class="form-control" data-error="company phone is required"
                                            placeholder="Enter company phone" type="text" name="phone"
                                            value="{{ $company->phone }}" id="form-company-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company address --}}
                                    <div class="form-group">
                                        <label for="form-company-address">Address</label>
                                        <input class="form-control" data-error="company address is required"
                                            placeholder="Enter company address" type="text" name="address"
                                            value="{{ $company->address }}" id="form-company-address" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company website --}}
                                    <div class="form-group">
                                        <label for="form-company-website">Website</label>
                                        <input class="form-control" data-error="company website is required"
                                            placeholder="Enter company website" type="text" name="website"
                                            value="{{ $company->website }}" id="form-company-website" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company introduction --}}
                                    <div class="form-group">
                                        <label>Introduction</label>
                                        <div class="pb-3">
                                            <button class="btn btn-outline-secondary" id="add-content-image">
                                                <i class="icon-picture"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-i">
                                                <i>i</i>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-b">
                                                <span class="font-weight-bold">b</span>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-link">
                                                <u>link</u>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-ul">
                                                ul
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-ol">
                                                ol
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-li">
                                                li
                                            </button>
                                        </div>
                                        <textarea class="form-control" rows="5" id="content-editor" name="introduction"
                                            placeholder="Enter company introduction">{{ $company->introduction }}</textarea>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($company->status == "active")
                                        <a href="{{ url("admin/company/{$company->id}/disable")}}"
                                            class="btn btn-danger single-disable">
                                            Disable
                                        </a>
                                        @elseif ($company->status == "disable")
                                        <a href="{{ url("admin/company/{$company->id}/restore")}}"
                                            class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- company status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($company->status == "active")
                                            <span style="font-weight: 800">Active</span>
                                            @elseif($company->status == "disable")
                                            <span style="font-weight: 800">Disabled</span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- company logo --}}
                                    <div class="form-group">
                                        <label for="form-company-logo">Logo</label>
                                        @if ($company->logo)
                                        <img src="{{ $company->logo }}" class="img-responsive" id="logo-preview">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="logo-preview">
                                        @endif
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" id="set-logo">Set Logo</button>
                                        <input type="hidden" name="logo">
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- START - Add Image Modal --}}
                        <div id="add-image-modal" aria-hidden="true" aria-labelledby="add-image-modal-title"
                            class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="add-image-modal-title">
                                            Add image
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
                                </div>
                            </div>
                        </div>
                        {{-- END - Add Image Modal --}}

                        {{-- START - Set Logo Modal --}}
                        <div id="set-logo-modal" aria-hidden="true" aria-labelledby="set-logo-modal-title"
                            class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="set-logo-modal-title">
                                            Set logo
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
                                                <input type="hidden" name="width" value="238">
                                                <input type="hidden" name="height" value="38">
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
                                        <button id="remove-logo" class="btn btn-danger text-white">
                                            Remove logo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END - Set Logo Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/company.js") }}"></script>
@endsection
