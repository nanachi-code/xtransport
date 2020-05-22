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

{{-- START - Content --}}
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
                    {{-- START - Detail box --}}
                    <div class="element-box">
                        <h5>Edit post</h5>
                        <hr>
                        <form id="form-single-post" action="{{ url("admin/post/{$post->id}/update")}}" method="POST"
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

                                    {{-- post excerpt --}}
                                    <div class="form-group">
                                        <label for="form-post-excerpt">Excerpt</label>
                                        <input class="form-control" data-error="Post excerpt is required"
                                            placeholder="Enter Post excerpt" required="required" type="text"
                                            name="excerpt" value="{{ $post->excerpt }}" id="form-post-excerpt" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- post content --}}
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
                                            placeholder="Enter post content">{{$post->content}}</textarea>
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
                                        <a href="{{ url("blog/post/{$post->id}") }}">View post</a>
                                    </div>
                                    {{-- post category --}}
                                    <div class="form-group">
                                        <label for="form-product-category">Category</label>
                                        <select class="form-control" id="form-post-category" name="category_post_id">
                                            <option value="" @if ($post->category_post_id ==
                                                null) selected @endif>
                                                Uncategorized
                                            </option>
                                            @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}" @if ($post->category_post_id ==
                                                $category->id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-post-thumbnail">Thumbnail</label>
                                        @if ($post->thumbnail)
                                        <img src="{{ $post->thumbnail }}" class="img-responsive" id="thumbnail-preview">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="thumbnail-preview">
                                        @endif

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-thumbnail">Set thumbnail</button>
                                            <input type="hidden" name="thumbnail" value="{{$post->thumbnail}}">
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

                    {{-- START - Comment box --}}
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
                                            @if (!empty($comment->user->avatar))
                                            <img src="{{$comment->user->avatar}}" alt="" srcset=""
                                                class="img-responsive">
                                            @else
                                            <img src="http://0.gravatar.com/avatar/682d4b43d822c9f69d565d5d37929540?s=120&d=mm&r=g"
                                                alt="" srcset="" class="img-responsive">
                                            @endif
                                            <div class="text-center mt-3">
                                                {{ $comment->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-sm-1 col-sm-9">
                                        @if ($comment->hasParents())
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
                    {{-- END - Comment box --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/post.js") }}"></script>
@endsection
