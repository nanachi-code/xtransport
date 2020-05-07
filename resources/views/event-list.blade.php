@extends('layout')

@section('title',"Event List")

@section('location')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>Event List</h3>
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
                            <span itemprop="title">Event List</span>
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
                    @if (count($event) >0)
                    @foreach ($event as $p)
                    <li>
                        <article class="entry-item">
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="{{url('/event/detail/'.$p->id)}}">{{$p->name}}</a>
                                </h4>
                                <p>
                                    <span>Ngày tổ chức : {{$p->date}}</span>
                                </p>
                            </header>
                            <div class="entry-thumb">
                                <div class="entry-thumb embed-responsive embed-responsive-16by9">
                                    <a href="{{url('/event/detail/'.$p->id)}}"><img
                                            src="{{asset('uploads/'.$p->thumbnail)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="entry-content">
                                <p>{!!$p->excerpt!!}</p>
                            </div>
                            <footer class="entry-footer clearfix">

                                <a href="{{url('/event/detail/'.$p->id)}}" class="kopa-btn btn-02">Xem chi tiết</a>

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
                    No posts found.
                    @endif
                </ul>
                <!-- nav pagination -->
                {{ $event->links('html.paginate') }}
                <!-- end -->
            </div>
        </div>
    </div>
</section>
@endsection
