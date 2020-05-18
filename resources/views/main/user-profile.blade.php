@extends('main.layouts.app')

@section('title',"User Profile")

@section('breadcrumb')
<!-- kopa area 24-->
<section class="kopa-area kopa-area-24 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>User Profile</h3>
                    <div class="breadcrumb-content">
                        <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                            <a itemprop="url" href="{{url('/')}}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">User profile</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->
<!-- kopa-area-->
@endsection

@section('content')
<section class="kopa-area kopa-area-40">
    <div class="container">
        <form class="billing-form ftco-bg-dark p-3 p-md-5" action="{{url("/user/profile/update",['id'=>$user->id])}}"
            method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="mb-4 billing-heading">User Profile</h3>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Avatar</label>
                    @if ($user->avatar)
                    <img src="{{ asset("uploads/{$user->avatar}") }}" class="input-preview img-thumbnail">
                    @else
                    <img src="{{ asset('images/default/no-image.jpg') }}" class="input-preview img-thumbnail">
                    @endif
                    <div class="form-buttons-w mt-3">
                        <input type="file" class="form-control-file" data-title="Upload" data-content="Upload"
                            name="avatar">
                    </div>
                </div>
                <div class="col-md-8 row align-items-end">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name">User Name</label>
                            <input type="text" name="name" class="form-control" placeholder="User Name"
                                value="{{$user->name}}" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}"
                                disabled>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dateOfBirth">Date of birth</label>
                            <input type="date" name="dateOfBirth" class="form-control" value="{{$user->dateOfBirth}}"
                                required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone">Telephone</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number"
                                value="{{$user->phone}}" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address"
                                value="{{$user->address}}" required>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12 justify-content-end">
                        <button type="button" class="btn btn-primary py-3 px-4" data-toggle="modal"
                            data-target="#changePassword">Change Password
                        </button>
                        <button id="form-update-user" class="btn btn-primary py-3 px-4" type="submit">Save
                        </button>
                    </div>
                </div>
            </div>
        </form><!-- END -->
    </div>
</section>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name">Old Password</label>
                            <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name">New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submit-password" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional-scripts')
<script type="text/javascript">
    $("#submit-password").on("click", function () {
            $.ajax({
                url: "{{url("user/changePassword")}}",
                method: "POST",
                data: {
                    _token: $("input[name=_token]").val(),
                    old_password: $("input[name=old_password]").val(),
                    new_password: $("input[name=new_password]").val(),
                    confirm_password: $("input[name=confirm_password]").val(),
                },
                success: function (res) {
                    if (res.status) {
                        alert("Change Password Successfully");
                        $("#changePassword").modal("hide");
                    } else {
                        alert(res.message);
                    }
                }
            });
        });
        $("#form-update-user").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: (res) => {
                    form.find(".alert-dismissible").remove();
                    form.prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                    setTimeout(() => {
                        form.find(".alert-dismissible").remove();
                    }, 3000);
                    console.log(res);
                },
                error: (e) => {
                    form.find(".alert-dismissible");
                    form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                    setTimeout(() => {
                        form.find(".alert-dismissible").remove();
                    }, 3000);
                    console.log(e.responseJSON);
                },
            });
        });
        $("input[type=file]").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".input-preview").attr("src", e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
</script>
@endsection
