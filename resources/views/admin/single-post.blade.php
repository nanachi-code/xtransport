@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/post/all') }}">All posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/post/{$post->id}") }}">{{ $post->name }}</a>
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
                                <h3>Post</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Edit post</h5>
                        <hr>
                        <form id="form-post" action="{{ url("admin/post/{$post->id}/update")}}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- post name --}}
                                    <div class="form-group">
                                        <label for="form-post-tỉtle">Title</label>
                                        <input class="form-control" data-error="Post title is required"
                                            placeholder="Enter Post title" required="required" type="text" name="title"
                                            value="{{ $post->title }}" id="form-post-title" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- post content --}}
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div class="pb-3">
                                            <button class="btn btn-outline-secondary" id="add-content-media">
                                                <i class="icon-picture"></i> (Not Working)
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
                                            placeholder="Enter post content">{{$post->content}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Preview</label>
                                        <div id="preview-post">
                                            {!! $post->content !!}
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($post->status == "publish")
                                        <a href="{{ url("admin/post/{$post->id}/delete")}}"
                                            class="btn btn-danger single-delete">
                                            Delete
                                        </a>
                                        @else
                                        <a href="{{ url("admin/post/{$post->id}/restore")}}" class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- post status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($post->status == "trashed")
                                            <span style="font-weight: 800">Trashed</span> at <span
                                                style="font-weight: 800">{{ $post->updated_at }}</span>
                                            @else
                                            <span style="font-weight: 800">Published</span> at <span
                                                style="font-weight: 800">{{ $post->updated_at }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- post category --}}
                                    <div class="form-group">
                                        <label for="form-product-category">Category</label>
                                        <select class="form-control" id="form-post-category" name="category_post_id">
                                            <option value="" @if ($post->category_post_id ==
                                                null) checked @endif>
                                                Uncategorized
                                            </option>
                                            @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}" @if ($post->category_post_id ==
                                                $category->id) checked @endif>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-post-thumbnail">Thumbnail</label>
                                        @if ($post->thumbnail)
                                        <img src="{{ asset("uploads/{$post->thumbnail}") }}"
                                            class="input-preview img-responsive">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">
                                        @endif

                                        <div class="form-buttons-w">
                                            <input type="file" class="form-control-file" data-title="Upload"
                                                name="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="element-box">
                        <h5>Comments</h5>
                        <hr>
                        <div class="comment-box">
                            @if (count($post->comments) == 0)
                            No comments found.
                            @else
                            @foreach ($post->comments as $comment)
                            <div class="comment-wrapper">
                                <div class="row mb-4">
                                    <div class="col-sm-1">
                                        <div class="comment-avatar">
                                            <img src="http://0.gravatar.com/avatar/682d4b43d822c9f69d565d5d37929540?s=120&d=mm&r=g"
                                                alt="" srcset="" class="image-responsize">
                                            <div class="text-center mt-3">
                                                {{ $comment->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-sm-1 col-sm-9">
                                        @if ($comment->parent)
                                        <div class="comment-reply-user mb-3">
                                            Reply to {{ $comment->parent->user->name }}
                                        </div>
                                        @endif
                                        <div class="comment-content">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="comment-action">
                                            <a href="{{ url("admin/comment/{$comment->id}/delete")}}"
                                                class="text-danger delete-post-comment" style="font-size: 25px"
                                                comment-id="{{ $comment->id }}">
                                                <i class="os-icon os-icon-ui-15"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
