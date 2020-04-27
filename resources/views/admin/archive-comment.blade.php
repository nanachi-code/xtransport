@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/comment/all') }}">All Posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/comment') }}">Comments</a>
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
                                <h3>Comment</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="table-admin-comment" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Comment</th>
                                        <th>Post</th>
                                        <th>Last updated</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>
                                            <a href="{{ url("/admin/post/{$comment->post->id}") }}">
                                                {{ $comment->post->title }}
                                            </a>
                                        </td>
                                        <td>{{ $comment->updated_at }}</td>
                                        <td class="row-actions">
                                            <a href="{{ url("admin/comment/{$comment->id}/delete")}}"
                                                class="danger dt-delete">
                                                <i class="os-icon os-icon-ui-15"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Comment</th>
                                        <th>Post</th>
                                        <th>Last updated</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection
