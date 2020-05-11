<!-- sidebar -->
<div class="col-xs-12 col-md-3 sidebar kopa-col-respon-2">
    <div class="row ct-row-06">
        <div class="col-xs-12">
            @if ($page == "single-event")
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
                                        <img src="{{ url("uploads/{$event->thumbnail}") }}" alt="">
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
                                    <a href="#">
                                        @if ($post->thumbnail)
                                        <img src="{{ url("uploads/{$post->thumbnail}") }}" alt="">
                                        @else
                                        <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                        @endif
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <h4 class="entry-title">
                                        <a href="{{ url("/post/id/{$post->title}") }}">
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
        </div>
    </div>
</div>
<!-- end side bar -->