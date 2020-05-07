@extends('layout')

@section('title',"Event detail")

@section('location')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>Event</h3>
                <div class="breadcrumb-content">
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{url('/')}}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{url('/event')}}">
                            <span itemprop="title">Event List</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">Event Detail</span>
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
                            <h4 class="entry-title">{{$event->name}}</h4>

                        </header>
                        <div class="entry-thumb">
                            <div class="entry-thumb embed-responsive embed-responsive-16by9">
                                <img src="{{asset('uploads/'.$event->thumbnail)}}" alt="">
                            </div>
                        </div>
                        <div class="entry-content">
                            {!! $event->introduction !!}
                        </div>
                        <article class="entry-item py-4">
                            <div class="row">
                                <div class="entry-content col-md-6">
                                    <div class="kopa-intro-box kopa-intro-box-4 clearfix">
                                        <div class="intro-box-content ">
                                            <h4 class="intro-box-title kopa-heading4">Thông tin tổ chức</h4>
                                            <p class="intro-box-sub-title kopa-heading5">Ngày tổ chức: {{$event->date}}
                                            </p>
                                            <p>Địa chỉ: {{$event->address}}</p>
                                            @if (Auth::user())
                                            <a href="" class="style-btn-01 md-btn">Đăng kí tham dự</a>
                                            @else
                                            <a href="{{url('/login')}}" class="">Đăng nhập để nhận mail tham dự</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
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
            </div>
        </div>
    </div>
</section>
@endsection
