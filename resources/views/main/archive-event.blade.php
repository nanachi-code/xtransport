@extends('main.layouts.app')

@section('title', "Events Archive")

@section('breadcrumb')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>{{$location}}</h3>
                <div class="breadcrumb-content">
                    <span>
                        <a href="{{ url('/') }}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span>
                        <a class="current-page">
                            <span itemprop="title">Events Archive</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- kopa area 37 -->
<section class="kopa-area kopa-area-37">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @if (count($events) >0)
                <div class="widget ex-module-grid-masonry-1">
                    <div class="widget-content">
                        <div class="masonry-container row">
                            @foreach ($events as $event)
                            <!-- mansory item -->
                            <div class="ms-item-01 show col-md-4 col-sm-6 col-xs-12" data-val="1">
                                <!-- ** -->
                                <article class="entry-item">
                                    <figure class="entry-thumb">
                                        <a href="{{url('/event/detail/'.$event->id)}}">
                                            @if ($event->thumbnail)
                                            <img src="{{ $event->thumbnail }}" alt="">
                                            @else
                                            <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="entry-content">
                                        <header class="entry-header">
                                            <h4 class="entry-title">
                                                <a href="{{url('/event/detail/'.$event->id)}}">
                                                    {{ $event->name }}
                                                </a>
                                            </h4>
                                        </header>
                                        <p>
                                            Date: {{ $event->date }}
                                            <br>
                                            Address: {{ $event->address }}
                                        </p>
                                        <footer class="entry-footer clearfix">
                                            <div class="alignleft">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                                {{ $event->users->count() }} users registered.
                                            </div>
                                            <div class="alignright">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                <a href="{{ url('/event/detail/'.$event->id) }}">Find out more</a>
                                            </div>
                                        </footer>
                                    </div>
                                </article>
                                <!-- * -->
                            </div>
                            <!-- end -->
                            @endforeach
                        </div>
                        <!-- nav pagination -->
                        {{ $events->links('main.subviews.paginate') }}
                        <!-- end -->
                    </div>
                </div>
                @else
                <h6>No upcoming events found.</h6>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- end kopa area 37 -->
@endsection
