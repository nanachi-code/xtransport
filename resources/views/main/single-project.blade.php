@extends('main.layouts.app')

@section('title', $project->name)

@section('breadcrumb')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>{{ $project->name }}</h3>
                <div class="breadcrumb-content">
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/') }}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/project') }}">
                            <span itemprop="title">Project</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">{{ $project->name }}</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- kopa area 26 -->
<section class="kopa-area kopa-area-26">
    <div class="container">
        <div class="row">
            <!-- main col -->
            <div class="col-xs-12 col-md-9  main-col">
                <!-- widget -->
                <div class="widget ex-module-present-8">
                    <header class="widget-header style-08">
                        <h3 class="widget-title">Project detail</h3>
                        <p class="sub-title">
                            {{ $project->excerpt }}
                        </p>
                    </header>
                    <div class="widget-content">
                        <article class="entry-item">
                            <figure class="entry-thumb">
                                <a href="#">
                                    <img src="{{ url("uploads/{$project->thumbnail}") }}" alt="">
                                </a>
                            </figure>
                            <div class="entry-content">
                                <p>
                                    {!! $project->content !!}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- end -->
                <!-- widget -->
                <div class="widget ex-module-present-8">
                    <header class="widget-header style-08">
                        <h3 class="widget-title">Project gallery</h3>
                    </header>
                    <div class="widget-content">
                        <article class="entry-item">
                            <div class="entry-content">
                                <div class="entry-gallery clearfix">
                                    <ul class=" row ul-mh">
                                        @foreach ($project->gallery as $image)
                                        <!-- ** -->
                                        <li class="col-xs-12 col-sm-4">
                                            <figure>
                                                <img src="{{ url("uploads/{$image}") }}" alt="">
                                            </figure>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- end -->
            </div>
            <!-- main col end -->

            <!-- start sidebar -->
            @include('main.subviews.sidebar', ["page" => "single-project"])
            <!-- end sidebar -->
        </div>
    </div>
</section>
<!-- end -->
@endsection
