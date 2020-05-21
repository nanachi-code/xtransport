@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/project/all') }}">All Posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/project/{$project->id}") }}">{{ $project->name }}</a>
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
                                <h3>Project</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Edit project</h5>
                        <hr>
                        <form id="form-single-project" action="{{ url("admin/project/{$project->id}/update")}}"
                            method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- project name --}}
                                    <div class="form-group">
                                        <label for="form-project-name">Name</label>
                                        <input class="form-control" data-error="project name is required"
                                            placeholder="Enter project name" required="required" type="text" name="name"
                                            value="{{ $project->name }}" id="form-project-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- project excerpt --}}
                                    <div class="form-group">
                                        <label for="form-project-excerpt">Excerpt</label>
                                        <input class="form-control" data-error="Project excerpt is required"
                                            placeholder="Enter project excerpt" required="required" type="text"
                                            name="excerpt" value="{{ $project->excerpt }}" id="form-project-excerpt" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- project content --}}
                                    <div class="form-group">
                                        <label>Content</label>
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
                                        <textarea class="form-control" rows="5" id="content-editor" name="content"
                                            placeholder="Enter project content">{{ $project->content }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Preview</label>
                                        <div id="preview-content">
                                            {!! $project->content !!}
                                        </div>
                                    </div>

                                    {{-- project gallery --}}
                                    <div class="form-group">
                                        <label for="form-project-gallery">Gallery</label>
                                        <div id="gallery-preview">
                                            <button class="btn btn-primary" id="set-gallery">Select image</button>
                                            <input type="hidden" name="gallery"
                                                value="{{ json_encode($project->gallery) }}">
                                            <div class="row pt-2">
                                                @foreach ($project->gallery as $image)
                                                <div class="col-sm-3">
                                                    <img src="{{ $image }}" class="img-responsive">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($project->status == "publish")
                                        <a href="{{ url("admin/project/{$project->id}/delete")}}"
                                            class="btn btn-danger single-delete">
                                            Delete
                                        </a>
                                        @else
                                        <a href="{{ url("admin/project/{$project->id}/restore")}}"
                                            class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- project status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($project->status == "trashed")
                                            <span style="font-weight: 800">Trashed</span> at <span
                                                style="font-weight: 800">{{ $project->updated_at }}</span>
                                            @else
                                            <span style="font-weight: 800">Published</span> at <span
                                                style="font-weight: 800">{{ $project->updated_at }}</span>
                                            @endif
                                        </div>
                                        <a href="{{ url("project/detail/{$project->id}") }}">View project</a>
                                    </div>


                                    {{-- project thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-project-thumbnail">Thumbnail</label>
                                        @if ($project->thumbnail)
                                        <img src="{{ $project->thumbnail }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @endif

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-thumbnail">Set thumbnail</button>
                                            <input type="hidden" name="thumbnail" value="{{$project->thumbnail}}">
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
                                                <input type="hidden" name="width" value="970">
                                                <input type="hidden" name="height" value="517">
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
                                                @if (in_array($image->getFilename(), $project->gallery))
                                                <div class="col-sm-2 gallery-item">
                                                    <img src="{{ $image->getRelativePathname() }}"
                                                        data-size="{{ $image->size }} B"
                                                        data-filename="{{ $image->getFilename() }}"
                                                        class="img-responsive selected">
                                                </div>
                                                @else
                                                <div class="col-sm-2 gallery-item">
                                                    <img src="{{ $image->getRelativePathname() }}"
                                                        data-size="{{ $image->size }} B"
                                                        data-filename="{{ $image->getFilename() }}"
                                                        class="img-responsive">
                                                </div>
                                                @endif
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
<script src="{{ asset("js/admin/custom/project.js") }}"></script>
@endsection
