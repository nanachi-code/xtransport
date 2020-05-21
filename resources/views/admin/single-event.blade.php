@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/event/all') }}">All Events</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/event/{$event->id}") }}">{{ $event->name }}</a>
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
                                <h3>Event</h3>
                            </div>
                        </div>
                    </div>
                    {{-- START - Detail box --}}
                    <div class="element-box">
                        <h5>Edit Event</h5>
                        <hr>
                        <form id="form-single-event" action="{{ url("admin/event/{$event->id}/update")}}" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- event name --}}
                                    <div class="form-group">
                                        <label for="form-event-name">Name</label>
                                        <input class="form-control" data-error="event name is required"
                                            placeholder="Enter event name" required="required" type="text" name="name"
                                            value="{{ $event->name }}" id="form-event-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- event date --}}
                                    <div class="form-group">
                                        <label for="form-event-date">Date</label>
                                        <input class="form-control" data-error="event date is required" type="date"
                                            name="date" value="{{ $event->date }}" id="form-event-date" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- event address --}}
                                    <div class="form-group">
                                        <label for="form-event-address">Address</label>
                                        <textarea class="form-control" rows="5" id="form-event-address" name="address"
                                            placeholder="Enter event address">{{$event->address}}</textarea>
                                    </div>

                                    {{-- event introduction --}}
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
                                            placeholder="Enter event introduction">{{ $event->introduction }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Preview</label>
                                        <div id="preview-content">
                                            {!! $event->introduction !!}
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($event->status == "active")
                                        <a href="{{ url("admin/event/{$event->id}/disable")}}"
                                            class="btn btn-danger single-disable">
                                            Disable
                                        </a>
                                        @elseif ($event->status == "disable")
                                        <a href="{{ url("admin/event/{$event->id}/restore")}}" class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- event status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($event->status == "active")
                                            <span style="font-weight: 800">Active</span>
                                            @elseif($event->status == "disable")
                                            <span style="font-weight: 800">Disabled</span>
                                            @endif
                                        </div>
                                        <a href="{{ url("event/detail/{$event->id}") }}">View event</a>
                                    </div>

                                    {{-- event max users --}}
                                    <div class="form-group">
                                        <label for="form-event-user">Max guests</label>
                                        <input class="form-control" data-error="max guests is required" type="number"
                                            name="max_users" value="{{ $event->max_users }}" id="form-event-user"
                                            min="1" max="500" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-event-thumbnail">Thumbnail</label>
                                        @if ($event->thumbnail)
                                        <img src="{{ $event->thumbnail }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @endif

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-thumbnail">Set Thumbnail</button>
                                            <input type="hidden" name="thumbnail" value="{{ $event->thumbnail }}">
                                        </div>
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
                    </div>
                    {{-- END - Detail box --}}

                    {{-- START - User box --}}
                    <div class="element-box">
                        <h5>Registered Users</h5>
                        <hr>
                        <div class="comment-box">
                            {{-- <pre>{{ var_dump($event->users) }}</pre> --}}
                            @if (count($event->users) == 0)
                            No users registered.
                            @else
                            <div class="user-wrapper">
                                @foreach ($event->users as $user)
                                <div class="row mb-4">
                                    <div class="col-sm-1">
                                        <div class="comment-avatar">
                                            <a href="{{ url("admin/user/{$user->id}") }}">
                                                <img src="http://0.gravatar.com/avatar/682d4b43d822c9f69d565d5d37929540?s=120&d=mm&r=g"
                                                    alt="" srcset="" class="img-responsive">
                                            </a>
                                            <div class="text-center mt-3">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- END - User box --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/event.js") }}"></script>
@endsection
