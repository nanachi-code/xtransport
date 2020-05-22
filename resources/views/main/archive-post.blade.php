@extends('main.layouts.app')

@section('title', $pageName)

@section('breadcrumb')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>{{ $pageName }}</h3>
                <div class="breadcrumb-content">
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/') }}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">{{ $pageName }}</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="kopa-area kopa-area-35">
    <div class="container">
        <div class="row">
            @if (count($posts) >0)
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <ul class="blog-article-list-1">
                    @foreach ($posts as $post)
                    <li>
                        <article class="entry-item">
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="{{ url("/blog/post/{$post->id}") }}">{{ $post->title }}</a>
                                </h4>
                                <p>
                                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; by <a
                                        href="#">{{ $post->user->name }}</a>
                                    <span>{{ $post->updated_at->toDateString() }}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ count($post->comments) }}
                                        <i class="fa fa-comment-o"
                                            aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                            </header>
                            @if ($post->thumbnail)
                            <div class="entry-thumb">
                                <div class="entry-thumb">
                                    <a href="{{ url("/blog/post/{$post->id}") }}">
                                        <img src="{{ $post->thumbnail }}">
                                    </a>
                                </div>
                            </div>
                            @endif
                            <div class="entry-content">
                                <p>{{ $post->excerpt }}</p>
                            </div>
                            <footer class="entry-footer clearfix">

                                <a href="{{ url("/blog/post/{$post->id}") }}" class="kopa-btn btn-02">read more</a>

                                <div class="wrap-social-link alignright">
                                    Share:
                                    <ul class="ul-mh">
                                        <li style="height: 22px;">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li style="height: 22px;">
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li style="height: 22px;">
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                        </article>
                    </li>
                    @endforeach
                </ul>
                <!-- nav pagination -->
                {{ $posts->links('main.subviews.paginate') }}
                <!-- end -->
            </div>
            @else
            <div class="col-xs-12 col-lg-12">
                <h6>No posts found.</h6>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
