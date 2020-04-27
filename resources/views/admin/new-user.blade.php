@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/user/all') }}">All Users</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/user/new") }}">New User</a>
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
                                <h3>User</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>New user</h5>
                        <hr>
                        <form id="form-create-user" action="{{ url("admin/user/new")}}" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- user name --}}
                                    <div class="form-group">
                                        <label for="form-user-name">Name</label>
                                        <input class="form-control" data-error="User name is required"
                                            placeholder="Enter user name" required="required" type="text" name="name"
                                            id="form-user-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user email --}}
                                    <div class="form-group">
                                        <label for="form-user-email">Email</label>
                                        <input class="form-control" data-error="User email is required" type="email"
                                            name="email" id="form-user-email" required />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user password --}}
                                    <div class="form-group">
                                        <label for="form-user-password">Password</label>
                                        <input class="form-control" data-error="User password is required"
                                            type="password" name="password" id="form-user-password" required />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user phone --}}
                                    <div class="form-group">
                                        <label for="form-user-price">Phone</label>
                                        <input class="form-control" placeholder="Enter user phone" type="text"
                                            name="phone" id="form-user-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user address --}}
                                    <div class="form-group">
                                        <label for="form-user-address">Address</label>
                                        <textarea class="form-control" rows="5" id="form-user-address" name="address"
                                            placeholder="Enter user address"></textarea>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- user role --}}
                                    <div class="form-group">
                                        <label for="form-user-role">Role</label>
                                        <select class="form-control" id="form-user-role" name="role">
                                            <option value="user">
                                                User
                                            </option>
                                            <option value="admin">
                                                Admin
                                            </option>
                                        </select>
                                    </div>

                                    {{-- user avatar --}}
                                    <div class="form-group">
                                        <label for="form-user-avatar">Avatar</label>
                                        <img src="{{ asset('images/default/no-image.jpg') }}" class="img-responsive"
                                            id="avatar-preview">

                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" id="set-avatar">Set avatar</button>
                                            <input type="hidden" name="avatar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- START - Set Avatar Modal --}}
                        <div id="set-avatar-modal" aria-hidden="true" aria-labelledby="set-avatar-modal-title"
                            class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="set-avatar-modal-title">
                                            Set avatar
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
                                        <button id="remove-avatar" class="btn btn-danger text-white">
                                            Remove avatar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END - Set Avatar Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END - Content --}}
@endsection

@section('additional-scripts')
<script src="{{ asset("js/admin/custom/user.js") }}"></script>
@endsection
