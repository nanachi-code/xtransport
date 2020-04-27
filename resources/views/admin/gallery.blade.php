@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/gallery') }}">Gallery</a>
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
                                <h3>Gallery</h3>
                            </div>
                        </div>
                    </div>
                    {{-- START - Upload Attachment --}}
                    <div class="element-box">
                        <h5>Upload new attachment</h5>
                        <hr>
                        <form class="upload-gallery" action="{{ url("admin/gallery/upload") }}" method="post"
                            enctype="multipart/form-data">
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
                                    data-size="{{ $image->getSize() }} B" data-filename="{{ $image->getFilename() }}"
                                    class="img-responsive">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        {{-- START - Attachment Info Modal --}}
                        <div id="attachment-info-modal" aria-hidden="true" aria-labelledby="attachment-info-modal-title"
                            class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="attachment-info-modal-title">
                                            Attachment details
                                        </h5>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <img id="attachment-image" class="img-responsive">
                                            </div>
                                            <div class="col-sm-4">
                                                <span style="font-weight: 800">Filename:</span> <span
                                                    id="attachment-filename"></span>
                                                <br>
                                                <span style="font-weight: 800">Size:</span> <span
                                                    id="attachment-size"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ url("admin/gallery/delete") }}" id="attachment-delete"
                                            class="btn btn-danger text-white">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END - Attachment Info Modal --}}
                    </div>
                    {{-- END - Attachment Library --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
