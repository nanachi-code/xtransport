<!-- sidebar -->
<div class="col-xs-12 col-md-3 sidebar kopa-col-respon-2">
    <div class="row ct-row-06">
        <div class="col-xs-12">
            @if ($page == "single-event")
            <!-- widget -->
            <div class="widget ex-module-article-list-1">
                <header class="widget-header style-09">
                    <h3 class="widget-title"><span>Details</span></h3>
                </header>
                <div class="widget-content">
                    <p class="intro-box-sub-title kopa-heading5">
                        Date: {{ $event->date }}
                        <br>
                        Address: {{ $event->address }}
                        <br>
                        Max participants: {{ $event->max_users }}
                        <br>
                        <span id="registered-count">
                            @if ($event->users->count() == 1)
                            1 user registered.
                            @else
                            {{ $event->users->count() }} users registered.
                            @endif
                        </span>
                    </p>
                </div>
            </div>
            <!-- end -->

            <!-- widget -->
            <div class="widget ex-module-article-list-1">
                <header class="widget-header style-09">
                    <h3 class="widget-title"><span>latest events</span></h3>
                </header>
                <div class="widget-content">
                    @if (count($latestEvents))
                    <ul class=" ul-mh">
                        @foreach ($latestEvents as $event)
                        <!-- ** -->
                        <li style="">
                            <article class="entry-item">
                                <figure class="entry-thumb">
                                    <a href="#">
                                        @if ($event->thumbnail)
                                        <img src="{{ $event->thumbnail }}" alt="">
                                        @else
                                        <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                        @endif
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h4 class="entry-title">
                                        <a href="{{ url("/event/detail/{$event->id}") }}">
                                            {{ $event->name }}
                                        </a>
                                    </h4>
                                    <div class="entry-meta">
                                        <p class="entry-date">
                                            {{ $event->date }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <h6>No events found.</h6>
                    @endif
                </div>
            </div>
            <!-- end -->
            @endif

            @if ($page == "single-post")
            <!-- widget -->
            <div class="widget ex-module-article-list-1">
                <header class="widget-header style-09">
                    <h3 class="widget-title"><span>latest post</span></h3>
                </header>
                <div class="widget-content">
                    {{-- <pre>{{var_dump($latestPosts)}}</pre> --}}
                    @if (count($latestPosts))
                    <ul class=" ul-mh">
                        @foreach ($latestPosts as $post)
                        <!-- ** -->
                        <li style="">
                            <article class="entry-item">
                                <figure class="entry-thumb">
                                    <a href="{{ url("blog/post/{$post->id}") }}">
                                        @if ($post->thumbnail)
                                        <img src="{{ $post->thumbnail }}" alt="">
                                        @else
                                        <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                        @endif
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h4 class="entry-title">
                                        <a href="{{ url("blog/post/{$post->id}") }}">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                    <div class="entry-meta">
                                        <p class="entry-date">
                                            {{ $post->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <h6>No posts found.</h6>
                    @endif
                </div>
            </div>
            <!-- end -->
            @endif

            @if ($page == "single-project")
            <!-- widget -->
            <div class="widget ex-module-article-list-1">
                <header class="widget-header style-09">
                    <h3 class="widget-title"><span>latest project</span></h3>
                </header>
                <div class="widget-content">
                    @if (count($latestProjects))
                    <ul class=" ul-mh">
                        @foreach ($latestProjects as $project)
                        <!-- ** -->
                        <li style="">
                            <article class="entry-item">
                                <figure class="entry-thumb">
                                    <a href="{{ url("/project/detail/{$project->id}") }}">
                                        @if ($project->thumbnail)
                                        <img src="{{ $project->thumbnail }}" alt="">
                                        @else
                                        <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                        @endif
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h4 class="entry-title">
                                        <a href="{{ url("/project/detail/{$project->id}") }}">
                                            {{ $project->name }}
                                        </a>
                                    </h4>
                                    <div class="entry-meta">
                                        <p class="entry-date">
                                            {{ $project->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <h6>No projects found.</h6>
                    @endif
                </div>
            </div>
            <!-- end -->
            @endif
        </div>
    </div>
</div>
<!-- end side bar -->
