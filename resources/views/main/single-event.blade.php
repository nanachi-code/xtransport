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
                                <img src="{{ $event->thumbnail }}" alt="">
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
                                    <p class="intro-box-sub-title">
                                        Date: {{ $event->date }}
                                        <br>
                                        Address: {{ $event->address }}
                                        <br>
                                        Max participants: {{ $event->max_users }}
                                        <br>
                                        <br>
                                        <span id="registered-count">
                                            @if ($event->users->count() == 1)
                                            1 user registered.
                                            @else
                                            {{ $event->users->count() }} users registered.
                                            @endif
                                        </span>

                                    </p>
                                    {{-- if logged in --}}
                                    @if (Auth::check())
                                    {{-- if registered start --}}
                                    @if ($event->users()->where("id", Auth::user()->id)->exists())
                                    {{-- if full start --}}
                                    @if (($event->users->count() == $event->max_users))
                                    <h6 class="full">This event is already full.</h6>
                                    @endif
                                    {{-- if full end --}}
                                    <h6 class="registered">You already registed for this event.</h6>
                                    <a href="{{ url("/event/detail/{$event->id}/unregister") }}" id="unregister-event"
                                        class="style-btn-01 md-btn mt-3">Unregister</a>
                                    {{-- if registered end --}}

                                    {{-- if not registered start --}}
                                    @else
                                    {{-- if full start --}}
                                    @if (($event->users->count() == $event->max_users))
                                    <h6 class="full">This event is already full.</h6>
                                    @else
                                    <a href="{{ url("/event/detail/{$event->id}/register") }}" id="register-event"
                                        class="style-btn-01 md-btn mt-3">Register</a>
                                    @endif
                                    {{-- if full end --}}
                                    @endif
                                    {{-- if not registered end --}}
                                    {{-- if logged in end --}}

                                    {{-- if not logged in start --}}
                                    @else
                                    <h6>You need to <a href="{{ url("login") }}">login</a> before register for
                                        this events.</h6>
                                    @endif
                                    {{-- if not logged in end --}}
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
        $(document).on("click", "#register-event, #unregister-event", function (e) {
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
                    }, 10000);

                    let count = "";
                    if (res.registered_count == 1) {
                        count = "1 user registered."
                    } else {
                        count = `${res.registered_count} users registered.`;
                    }
                    console.log(res.registered_count);

                    $("#registered-count").html(count);

                    if (res.is_full) {
                        if (!$("h6.full").length) {
                            if ($("h6.registered").length) {
                                $("h6.registered").after(`
                                    <h6 class="full">This event is already full.</h6>
                                `);
                            } else {
                                button.before(`
                                    <h6 class="full">This event is already full.</h6>
                                `);
                            }
                        }
                    } else {
                        if ($("h6.full").length) {
                            $("h6.full").remove();
                        }
                    }

                    if (button.is("#register-event")) {
                        button.before(`
                            <h6 class="registered">You already registed for this event.</h6>
                        `);
                        button.before(`
                            <a href="{{ url("/event/detail/{$event->id}/unregister") }}" id="unregister-event"
                                class="style-btn-01 md-btn mt-3">Unregister</a>
                        `);
                        button.remove();
                    } else {
                        $(`h6.registered`).remove();
                        button.before(`
                            <a href="{{ url("/event/detail/{$event->id}/register") }}" id="register-event"
                                class="style-btn-01 md-btn mt-3">Register</a>
                        `);
                        button.remove();
                    }

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
