@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/company/all') }}">All Companies</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/company/new") }}">New Company</a>
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
                                <h3>Company</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>New Company</h5>
                        <hr>
                        <form id="form-create-company" action="{{ url("admin/company/new")}}" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- company name --}}
                                    <div class="form-group">
                                        <label for="form-company-name">Name</label>
                                        <input class="form-control" data-error="company name is required"
                                            placeholder="Enter company name" required="required" type="text" name="name"
                                            id="form-company-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company email --}}
                                    <div class="form-group">
                                        <label for="form-company-email">Email</label>
                                        <input class="form-control" data-error="company email is required" type="email"
                                            name="email" id="form-company-email" required />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company post --}}
                                    <div class="form-group">
                                        <label for="form-company-role">Company Information Post</label>
                                        <select class="form-control" id="form-company-post" name="post_id">
                                            <option value="">
                                                None
                                            </option>
                                            @foreach ($select_post as $post)
                                            <option value="{{$post->id}}">
                                                {{$post->title}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- company phone --}}
                                    <div class="form-group">
                                        <label for="form-company-price">Phone</label>
                                        <input class="form-control" placeholder="Enter company phone" type="text"
                                            name="phone" id="form-company-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- company address --}}
                                    <div class="form-group">
                                        <label for="form-company-address">Address</label>
                                        <textarea class="form-control" rows="5" id="form-company-address" name="address"
                                            placeholder="Enter company address"></textarea>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- company logo --}}
                                    <div class="form-group">
                                        <label for="form-company-thumbnail">Logo</label>
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">

                                        <div class="form-buttons-w">
                                            <input type="file" class="form-control-file" data-title="Upload"
                                                name="logo">
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
