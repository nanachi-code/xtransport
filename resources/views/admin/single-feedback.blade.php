@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/feedback/all') }}">All Feedback</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/feedback/{$feedback->id}") }}">{{ $feedback->name }}</a>
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
                                <h3>Feedback</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Feedback Details</h5>
                        <hr>
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- feedback name --}}
                                    <div class="form-group">
                                        <label for="form-feedback-name">Name</label>
                                        <input class="form-control" data-error="feedback name is required"
                                            placeholder="Enter feedback name" required="required" type="text" name="name"
                                            value="{{ $feedback->name }}" id="form-feedback-name" disabled/>
                                    </div>

                                    {{-- feedback email --}}
                                    <div class="form-group">
                                        <label for="form-feedback-name">Name</label>
                                        <input class="form-control" data-error="feedback email is required"
                                            placeholder="Enter feedback email" required="required" type="email" name="email"
                                            value="{{ $feedback->email }}" id="form-feedback-email" disabled/>
                                    </div>

                                    {{-- feedback url --}}
                                    <div class="form-group">
                                        <label for="form-feedback-url">Website Url</label>
                                        <input class="form-control" data-error="feedback website_url is required"
                                            placeholder="Enter feedback website_url" required="required" type="text" name="website_url"
                                            value="{{ $feedback->website_url }}" id="form-feedback-website_url" disabled/>
                                    </div>

                                    {{-- feedback desc --}}
                                    <div class="form-group">
                                        <label for="form-feedback-desc">Comment</label>
                                        <textarea class="form-control" rows="3" id="form-feedback-desc"
                                            name="description"
                                            placeholder="Enter feedback description" disabled>{{$feedback->comment}}</textarea>
                                    </div>
                                    <div class="form-buttons-w">

                                            <a href="{{ url("admin/feedback/{$feedback->id}/delete")}}"
                                               class="btn btn-danger single-disable">
                                                Delete
                                            </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
