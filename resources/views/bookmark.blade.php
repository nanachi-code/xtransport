@extends('layout')

@section('title',"Library")

@section('location')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>Library</h3>
                    <div class="breadcrumb-content">
                        <p>We offer a big storage space, heated and with air condition, to store
                            <br> your good’s safe and organized even for longer period of time.</p>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{url('/')}}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" @if($location!='' ) href="{{url('/library')}}" @else class="current-page"
                                @endif>
                                <span itemprop="title">Library</span>
                            </a>
                        </span>
                        @if ($location == 'user')
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">My document</span>
                            </a>
                        </span>
                        @elseif($location == 'bookmark')
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">Bookmarked</span>
                            </a>
                        </span>
                        @endif
                    </div>
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
            <div class="kopa-tab kopa-tab-9">
                <div class="col-xs-12 col-sm-3 no-padding">
                    <ul class="nav nav-stacked">
                        <li class="@if($location == 'user') active @endif"><a href="{{url('library/user/')}}"><i
                                    class="fa fa-user" aria-hidden="true"></i>My
                                Document</a></li>
                        <li class="@if($location == 'bookmark') active @endif"><a href="{{url('library/bookmark/')}}"><i
                                    class="fa fa-star" aria-hidden="true"></i>Bookmarked</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <article class="entry-item clearfix widget">
                    <div class="entry-content">
                        <h3 class="widget-title kopa-heading2 size-normal">My bookmarked</h3>
                        <ul class="ul-mh row">
                            @foreach ($bookmarked as $d)
                            <li class="col-xs-12 col-sm-12 col-md-4 pb-2" style="max-height: 450px;">
                                <article class="entry-item">
                                    <div>
                                        <img src="{{asset('images/course.jpg')}}" alt="">
                                    </div>
                                    <div class="entry-content">
                                        <div class="kopa-intro-box kopa-intro-box-4">
                                            <div class="intro-box-content">
                                                <h4 class="intro-box-title kopa-heading4">
                                                    <a href="{{url('library/detail/')}}">{{$d->title}}</a>
                                                </h4>
                                                <p>Author: {{$d->author}}</p>
                                                <p>Rating</p>
                                                <p>Download: {{$d->download_number}}</p>
                                                <br>
                                                <a href="{{url('/library/un-bookmark/'.$d->id)}}"
                                                    class="style-btn-03 sm-btn">Unbookmark</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
