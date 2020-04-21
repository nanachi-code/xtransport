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
        <a href="{{ url("admin/user/{$user->id}") }}">{{ $user->name }}</a>
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
                        <h5>Edit user</h5>
                        <hr>
                        <form id="form-user" action="{{ url("admin/user/{$user->id}/update")}}" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- user name --}}
                                    <div class="form-group">
                                        <label for="form-user-name">Name</label>
                                        <input class="form-control" data-error="User name is required"
                                            placeholder="Enter user name" required="required" type="text" name="name"
                                            value="{{ $user->name }}" id="form-user-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user email --}}
                                    <div class="form-group">
                                        <label for="form-user-email">Email</label>
                                        <input class="form-control" data-error="User email is required" type="email"
                                            name="email" value="{{ $user->email }}" id="form-user-email" disabled />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user phone --}}
                                    <div class="form-group">
                                        <label for="form-user-price">Phone</label>
                                        <input class="form-control" placeholder="Enter user phone" type="text"
                                            name="phone" value="{{ $user->phone }}" id="form-user-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- user address --}}
                                    <div class="form-group">
                                        <label for="form-user-address">Address</label>
                                        <textarea class="form-control" rows="5" id="form-user-address" name="address"
                                            placeholder="Enter user address">{{$user->address}}</textarea>
                                    </div>


                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($user->status == "active")
                                        <a href="{{ url("admin/user/{$user->id}/disable")}}"
                                            class="btn btn-danger single-disable">
                                            Disable
                                        </a>
                                        @elseif ($user->status == "disable")
                                        <a href="{{ url("admin/user/{$user->id}/restore")}}" class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- user status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <div>
                                            @if ($user->status == "active")
                                            <span style="font-weight: 800">Active</span>
                                            @elseif($user->status == "disable")
                                            <span style="font-weight: 800">Disabled</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- user role --}}
                                    <div class="form-group">
                                        <label for="form-user-role">Role</label>
                                        <select class="form-control" id="form-user-role" name="role">
                                            <option value="user" @if ($user->role == "user") selected @endif>
                                                User
                                            </option>
                                            <option value="admin" @if ($user->role == "admin") selected @endif>
                                                Admin
                                            </option>
                                        </select>
                                    </div>

                                    {{-- user avatar --}}
                                    <div class="form-group">
                                        <label for="form-user-thumbnail">Avatar</label>
                                        @if ($user->avatar)
                                        <img src="{{ asset("uploads/{$user->avatar}") }}"
                                            class="input-preview img-responsive">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">
                                        @endif

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
