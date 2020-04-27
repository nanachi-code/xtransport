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
                        <form id="form-company" action="{{ url("admin/company/{$company->id}/update")}}" method="post"
                            enctype="multipart/form-data">
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
                                            name="email" value="{{ $company->email }}" id="form-company-email"
                                            disabled />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company post --}}
                                    <div class="form-group">
                                        <label for="form-company-post">Company Information Post</label>
                                        <select class="form-control" id="form-company-post" name="post_id">
                                            <option value="">
                                                None
                                            </option>
                                            @foreach ($select_post as $post)
                                            <option value="{{$post->id}}" @if($post->id == $company->post_id) selected
                                                @endif>
                                                {{$post->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- company phone --}}
                                    <div class="form-group">
                                        <label for="form-company-price">Phone</label>
                                        <input class="form-control" placeholder="Enter company phone" type="text"
                                            name="phone" value="{{ $company->phone }}" id="form-company-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company address --}}
                                    <div class="form-group">
                                        <label for="form-company-address">Address</label>
                                        <textarea class="form-control" rows="5" id="form-company-address" name="address"
                                            placeholder="Enter company address">{{$company->address}}</textarea>
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

                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-company-thumbnail">Thumbnail</label>
                                        @if ($company->logo)
                                        <img src="{{ asset("uploads/{$company->logo}") }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @endif

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-thumbnail">Set Logo</button>
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
                                                    <img src="{{ asset("uploads/{$image->getFilename()}") }}"
                                                        data-size="{{ $image->getSize() }} B"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
