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
                    <div class="element-box">
                        <h5>Edit Event</h5>
                        <hr>
                        <form id="form-event" action="{{ url("admin/event/{$event->id}/update")}}" method="post"
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

                                    {{-- event post --}}
                                    <div class="form-group">
                                        <label for="form-event-post">Event Information Post</label>
                                        <select class="form-control" id="form-event-post" name="post_id">
                                            <option value="">
                                                None
                                            </option>
                                            @foreach ($select_post as $post)
                                            <option value="{{$post->id}}" @if($post->id == $event->post_id) selected
                                                @endif>
                                                {{$post->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- event address --}}
                                    <div class="form-group">
                                        <label for="form-event-address">Address</label>
                                        <textarea class="form-control" rows="5" id="form-event-address" name="address"
                                            placeholder="Enter event address">{{$event->address}}</textarea>
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
                                    </div>

                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-event-thumbnail">Thumbnail</label>
                                        @if ($event->thumbnail)
                                        <img src="{{ asset("uploads/{$event->thumbnail}") }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @endif

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-thumbnail">Set Thumbnail</button>
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
