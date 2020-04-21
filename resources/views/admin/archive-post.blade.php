@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/post/all') }}">All Posts</a>
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
                            <div class="float-right">
                                <a class="btn-outline-primary btn" href="{{ url('admin/post/new') }}">New</a>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="table-admin-post" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Last updated</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if (!$post->category)
                                            Uncategorized
                                            @else
                                            {{ $post->category->name }}
                                            @endif
                                        </td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->status }}</td>
                                        <td>{{ $post->updated_at }}</td>
                                        <td class="row-actions">
                                            <a href="{{ url("/admin/post/{$post->id}")}}">
                                                <i class="os-icon os-icon-ui-49"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>User</th>
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
