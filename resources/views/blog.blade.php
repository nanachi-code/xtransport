@extends('layout')

@section('title',"Blogs")

@section('location')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>{{ $location }}</h3>
                <div class="breadcrumb-content">
                    <p>We offer a big storage space, heated and with air condition, to store
                        <br> your good’s safe and organized even for longer period of time.</p>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/') }}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">{{ $location }}</span>
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
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <ul class="blog-article-list-1">
                    @if (count($post) >0)
                    @foreach ($post as $p)
                    <li>
                        <article class="entry-item">
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="{{url('post/'.$p->id)}}">{{$p->title}}</a>
                                </h4>
                                <p>
                                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; by <a
                                        href="#">{{$p->user->name}}</a>
                                    <span>{{$p->updated_at->toDateString()}}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>3 <i
                                            class="fa fa-comment-o"
                                            aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                            </header>
                            <div class="entry-thumb">
                                <div class="entry-thumb embed-responsive embed-responsive-16by9">
                                    <a href="{{url('post/'.$p->id)}}"><img src="{{asset('uploads/'.$p->thumbnail)}}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="entry-content">
                                <p>{!!$p->excerpt!!}</p>
                            </div>
                            <footer class="entry-footer clearfix">

                                <a href="{{url('post/'.$p->id)}}" class="kopa-btn btn-02">read more</a>

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
                    @else
                    <h6>No posts found.</h6>
                    @endif
                </ul>
                <!-- nav pagination -->
                {{ $post->links('html.paginate') }}
                <!-- end -->
            </div>
        </div>
    </div>
</section>
@endsection
