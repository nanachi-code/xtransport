@extends('main.layouts.app')

@section('title', $event->name)

@section('breadcrumb')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>Event</h3>
                <div class="breadcrumb-content">
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/') }}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/event') }}">
                            <span itemprop="title">Events Archive</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">{{ $event->name }}</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="kopa-area-48">
    <div class="container">
        <div class="row">
            <!-- main col -->
            <div class="col-xs-12 col-md-9 main-col">
                <div class="kopa-wrap-entry-item">
                    <article class="entry-item">
                        <header class="entry-header">
                            <h4 class="entry-title">{{ $event->name }}</h4>
                        </header>
                        <div class="entry-thumb">
                            <div class="entry-thumb embed-responsive embed-responsive-16by9">
                                @if ($event->thumbnail)
                                <img src="{{ url("uploads/{$event->thumbnail}") }}" alt="">
                                @else
                                <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="entry-content">
                            {!! $event->introduction !!}
                        </div>

                        <footer class="entry-footer clearfix">
                            <div class="wrap-social-link alignright">
                                Share:
                                <ul class="">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                    </article>
                </div>
                <article id="event-info" class="entry-item py-4">
                    <div class="row">
                        <div class="entry-content col-md-12">
                            <div class="kopa-intro-box kopa-intro-box-4 clearfix">
                                <div class="intro-box-content ">
                                    <h4 class="intro-box-title kopa-heading4">Details</h4>
                                    <p class="intro-box-sub-title kopa-heading5">
                                        Date: {{ $event->date }}
                                    </p>
                                    <p>
                                        Address: {{ $event->address }}
                                    </p>

                                    @if (Auth::check())
                                    <a href="{{ url("/event/detail/{$event->id}") }}" id="register-event"
                                        class="style-btn-01 md-btn">Register</a>
                                    @else
                                    <p>You need to <a href="{{ url("login") }}">login</a> before register for
                                        this events.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <!-- end main col -->

            @include('main.subviews.sidebar', ["page" => "single-event"])
        </div>
    </div>
</section>
@endsection

@section('additional-scripts')
<script>
    $(function () {
        $("#register-event").on("click", function (e) {
            e.preventDefault();

            let button = $(this),
                target = $("#event-info");

            $.ajax({
                type: "POST",
                url: button.attr("href"),
                dataType: "json",
                success: function (res) {
                    target.find(".alert-dismissible").remove();
                    target.prepend(`
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                    setTimeout(() => {
                    target.find(".alert-dismissible").remove();
                    }, 3000);
                    console.log(res);
                },
                error: function (e) {
                    console.log(e.responseJSON);

                    for (const key in e.responseJSON.errors) {
                        for (const message of e.responseJSON.errors[key]) {
                            target.prepend(`
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span>
                                </button>
                                ${message}
                            </div>`);
                        }
                    }
                    setTimeout(() => {
                    target.find(".alert-dismissible").remove();
                    }, 3000);
                }
            });
        });
    })
</script>
@endsection
