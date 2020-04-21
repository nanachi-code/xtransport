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
                                        <label for="form-user-thumbnail">Avatar</label>
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">

                                        <div class="form-buttons-w">
                                            <input type="file" class="form-control-file" data-title="Upload"
                                                name="avatar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
