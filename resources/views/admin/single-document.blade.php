@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/document/all') }}">All documents</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/document/{$document->id}") }}">{{ $document->title }}</a>
    </li>
</ul>
{{-- END - Breadcrumbs --}}
{{-- START - summary --}}
<div class="summary-i">
    <div class="summary-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3>Document</h3>
                            </div>
                        </div>
                    </div>
                    {{-- START - Detail box --}}
                    <div class="element-box">
                        <h5>View document</h5>
                        <hr>
                        <form action="{{ url("admin/document/{$document->id}/update")}}" method="document">
                            @csrf
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- document title --}}
                                    <div class="form-group">
                                        <label for="form-document-tỉtle">Title</label>
                                        <input class="form-control" data-error="document title is required"
                                            placeholder="Enter document title" required="required" type="text"
                                            name="title" value="{{ $document->title }}" id="form-document-title"
                                            disabled />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- document author --}}
                                    <div class="form-group">
                                        <label for="form-document-author">Author</label>
                                        <input class="form-control" data-error="document author is required"
                                            placeholder="Enter document author" required="required" type="text"
                                            name="author" value="{{ $document->author }}" id="form-document-author"
                                            disabled />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- document author --}}
                                    <div class="form-group">
                                        <label for="form-document-file">File path</label>
                                        <input class="form-control" data-error="document file is required"
                                            placeholder="Upload document file" required="required" type="text"
                                            name="file"
                                            value="{{ asset("uploads/documents/" . $document->user_id . '/' . $document->file) }}"
                                            id="form-document-author" disabled />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- document summary --}}
                                    <div class="form-group">
                                        <label>Summary</label>
                                        <textarea class="form-control" rows="5" id="summary-editor" name="summary"
                                            placeholder="Enter document summary"
                                            disabled>{{$document->summary}}</textarea>
                                    </div>
                                    <div class="form-buttons-w">
                                        <a href="{{ url("admin/document/all")}}" class="btn btn-success">
                                            Back </a>
                                        @if ($document->status == App\Document::PUBLISH)
                                        <a href="{{ url("admin/document/{$document->id}/delete")}}"
                                            class="btn btn-danger single-delete">
                                            Delete
                                        </a>
                                        @endif
                                        @if($document->status == App\Document::PENDING)
                                        <a href="{{ url("admin/document/{$document->id}/publish")}}"
                                            class="btn btn-success">
                                            Publish
                                        </a>
                                        @endif
                                        @if ($document->status == App\Document::DELETED)
                                        <a href="{{ url("admin/document/{$document->id}/restore")}}"
                                            class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- document status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($document->status == App\Document::DELETED)
                                            <span style="font-weight: 800">Deleted</span> at <span
                                                style="font-weight: 800">{{ $document->updated_at }}</span>
                                            @else
                                            @if ($document->status == App\Document::PUBLISH)
                                            <span style="font-weight: 800">Published</span> at <span
                                                style="font-weight: 800">{{ $document->updated_at }}</span>
                                            @else
                                            <span style="font-weight: 800">Pending</span> at <span
                                                style="font-weight: 800">{{ $document->updated_at }}</span>
                                            @endif
                                            @endif
                                        </div>
                                        <a href="{{ url("library/detail/{$document->id}") }}">View document</a>

                                    </div>
                                    <div>Download number: {{$document->download_number}}</div>
                                    <br>
                                    <div>Bookmark number: {{$document->bookmark_number}}</div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- END - Detail box --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - summary --}}
@endsection
