@extends('main.layouts.app')

@section('title', "TransportX")

@section('content')
<!-- main content -->
<div class="main-content">

    <!-- slide introduce -->
    <section class="kopa-area kopa-area-1-1 kopa-no-space white-text-style">

        <!-- slider pro 1 -->
        <div class="widget ex-module-slider-pro-1">
            <div class="widget-content">
                <div class="slider-pro">
                    <div class="sp-slides">
                        <div class="sp-slide">
                            <img class="sp-image" src="{{ asset("/images/default/img-slider-introduce-2.jpg") }}">
                            <p class="kopa-txt-style-04 sp-layer" data-horizontal="195" data-vertical="160"
                                data-show-transition="left">
                                open hours 7 days a week
                            </p>
                            <p class="kopa-txt-style-03 sp-layer" data-horizontal="145" data-vertical="200"
                                data-show-transition="left" data-show-delay="200">
                                <a href="#">(+84) 398698695</a>
                            </p>
                            <p class="sp-layer kopa-sp-layer-line" data-horizontal="105" data-vertical="280">
                                <span class="kopa-line-style-01"></span>
                            </p>
                            <p class="kopa-txt-style-05 sp-layer" data-horizontal="230" data-vertical="310"
                                data-show-transition="left" data-show-delay="400">
                                exprienced
                            </p>
                            <p class="kopa-txt-style-06 sp-layer" data-horizontal="140" data-vertical="350"
                                data-show-transition="left" data-show-delay="600">
                                We have over fifty years of combined experience.
                            </p>
                            <p class="sp-layer kopa-sp-layer-btn-02" data-horizontal="220" data-vertical="430"
                                data-show-transition="left" data-show-delay="800">
                                <a href="{{ url("contact") }}" class="btn-01">contact us</a>
                            </p>
                        </div>

                        <div class="sp-slide">
                            <img class="sp-image" src="{{asset("/images/default/img-slider-introduce-3.jpg")}}" alt="">
                            <p class="sp-layer kopa-title-7" data-horizontal="700" data-vertical="180"
                                data-show-transition="left">
                                BUILD AN ADVANCED TRANSPORTATION NETWORK,
                                <br> IMPROVE TRAFFIC QUALITY.
                            </p>

                            <p class="sp-layer h4" data-horizontal="735" data-vertical="320" data-show-transition="left"
                                data-show-delay="200">
                                We are a big, flexible group of experts dedicated to serving you and your traffic needs.
                            </p>

                            <p class="sp-layer kopa-sp-layer-btn-04" data-horizontal="735" data-vertical="380"
                                data-show-transition="left" data-show-delay="800">
                                <a href="{{ url("blog/all") }}" class="btn-04">our blog</a>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="loading">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>

    </section>
    <!-- end introduce -->

    <!-- thumbnail services -->
    <section class="kopa-area kopa-area-15">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget ex-module-our-services-9">
                        <div class="widget-content">
                            <ul class="row ul-mh">
                                <!-- ** -->
                                <li class="col-xs-12 col-sm-4 col-md-4">
                                    <article class="entry-item ">
                                        <div class="entry-thumb">
                                            <a href="{{ url("projects/all") }}"><span class="ex ex-archive"></span></a>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title"><a href="#">Browse our works</a></h4>
                                            <p>
                                                We have done more than 100 projects for many clients around the
                                                world and all of our works has recieved positive feedback!
                                            </p>

                                            <a href="#" class="kopa-btn btn-09">LEARN MORE</a>

                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li class="col-xs-12 col-sm-4 col-md-4">
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <a href="{{ url("event/all") }}"><span
                                                    class="ex ex-hours-support"></span></a>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <a href="{{ url("event/all") }}">Participate our events</a>
                                            </h4>
                                            <p>
                                                Join our events hosted monthly with our experts to discuss about
                                                the current and future state of transportation services.
                                            </p>

                                            <a href="{{ url("event/all") }}" class="kopa-btn btn-09">LEARN MORE</a>

                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li class="col-xs-12 col-sm-4 col-md-4">
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <a href="{{ url("product/all") }}"><span class="ex ex-folder"></span></a>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <a href="{{ url("product/all") }}">featured products</a>
                                            </h4>
                                            <p>
                                                We feature many modern traffic equiptments from our partners. Contact us
                                                if want your products to appear on our page.
                                            </p>

                                            <a href="{{ url("product/all") }}" class="kopa-btn btn-09">LEARN MORE</a>

                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end thumbnail services -->

    <!-- Get an install Online Quote -->
    <section class="kopa-area kopa-area-16 white-text-style" id="kopa-get-online-quote">
        <div class="container-fluid">
            <div class="row ul-mh">
                <div class="col-xs-12 col-sm-6 ct-col-06">
                    <div class="widget ex-module-slider-3">
                        <div class="widget-content">
                            <div class="carousel slide myCarousel" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <ul class="carousel-inner " role="listbox">
                                    <!-- ** -->
                                    <li class="item active">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/71x71" alt="ava-ceo1">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <header class="entry-header">
                                                    <h4 class="entry-title"><a href="#">john smith</a></h4>
                                                    <p>CEO / Transport inc.</p>
                                                </header>
                                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor
                                                    mauris sit amet orci. Aenean dignissim pellentesque felis. </p>
                                            </div>
                                        </article>
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/71x71" alt="ava-ceo1">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <header class="entry-header">
                                                    <h4 class="entry-title"><a href="#">david alibaba</a></h4>
                                                    <p>CEO / Transport inc.</p>
                                                </header>
                                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor
                                                    mauris sit amet orci. Aenean dignissim pellentesque felis. </p>
                                            </div>
                                        </article>
                                    </li>
                                    <!-- ** -->
                                    <li class="item">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/71x71" alt="ava-ceo1">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <header class="entry-header">
                                                    <h4 class="entry-title"><a href="#">john smith</a></h4>
                                                    <p>CEO / Transport inc.</p>
                                                </header>
                                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor
                                                    mauris sit amet orci. Aenean dignissim pellentesque felis. </p>
                                            </div>
                                        </article>
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/71x71" alt="ava-ceo1">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <header class="entry-header">
                                                    <h4 class="entry-title"><a href="#">david alibaba</a></h4>
                                                    <p>CEO / Transport inc.</p>
                                                </header>
                                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor
                                                    mauris sit amet orci. Aenean dignissim pellentesque felis. </p>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href=".myCarousel" role="button" data-slide="prev">
                                    <span class="ti-arrow-left"></span>
                                </a>
                                <a class="right carousel-control" href=".myCarousel" role="button" data-slide="next">
                                    <span class="ti-arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * -->
                <!-- ** -->
                <div class="col-xs-12 col-sm-6 ct-col-08">
                    <div class="widget ex-module-about-us-1">
                        <header class="widget-header style-01">
                            <span class="sub-title">about us</span>
                            <h3 class="widget-title">
                                we offer quick &amp; <br>powerful solution
                            </h3>
                        </header>
                        <div class="widget-content">
                            <article class="entry-item">
                                <figure class="entry-thumb">
                                    <img src="http://placehold.it/202x175" alt="img-get-quote-online">
                                </figure>
                                <div class="entry-content">
                                    <p>On moving day, sit back and let Atlas carry the load. It's what we do best.
                                        Experienced crews protect your home, load, and move your items all the way to
                                        your new place, including placing the furniture where you want it. You've got it
                                        in you to go new places.</p>
                                </div>
                                <div class="clearfix"></div>
                                <a href="#" class="kopa-btn btn-01">read more</a>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- * -->
            </div>
        </div>
    </section>
    <!-- end Get an install online Quote -->

    <!-- our services 2 -->
    <section class="kopa-area kopa-area-18">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                    <div class="widget ex-module-introduce-3">
                        <header class="widget-header style-07">
                            <span class="sub-title">Our Services</span>
                            <h3 class="widget-title">
                                SERVICES WE PROVIDE
                            </h3>
                        </header>
                        <div class="widget-content">
                            <article class="entry-item">
                                <div class="entry-content">
                                    <p>Recognizing everyone's need for speed, Atlas
                                        <br> was the first to give an Instant Online Moving
                                        <br> Quote. The Atlas online quote remains the
                                        <br> fastest ballpark quote in moving</p>

                                    <a href="#" class="kopa-btn btn-01">view all</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
                    <!-- widget -->
                    <div class="widget ex-module-our-services-3">

                        <div class="widget-content">
                            <ul class="row ul-mh">
                                <!-- ** -->
                                <li class="col-xs-12 col-lg-6">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <a class="ex ex-worker-loading-boxes" href="#"></a>
                                        </figure>
                                        <div class="entry-content">
                                            <h4 class="entry-title"><a href="#">Home Removals</a></h4>
                                            <p>Tex Trucking is one of the most trusted names in trucking, and an
                                                industry leader in home</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- * -->
                                <!-- ** -->
                                <li class="col-xs-12 col-lg-6">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <a class="ex ex-loaded-truck-side-view" href="#"></a>
                                        </figure>
                                        <div class="entry-content">
                                            <h4 class="entry-title"><a href="#">international Removals</a></h4>
                                            <p>Tex Trucking is one of the most trusted names in trucking, and an
                                                industry leader in home</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- * -->
                                <!-- ** -->
                                <li class="col-xs-12 col-lg-6">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <a class="ex ex-logistics-delivery-truck-and-clock" href="#"></a>
                                        </figure>
                                        <div class="entry-content">
                                            <h4 class="entry-title"><a href="#">moving materials</a></h4>
                                            <p>Tex Trucking is one of the most trusted names in trucking, and an
                                                industry leader in home</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- * -->
                                <!-- ** -->
                                <li class="col-xs-12 col-lg-6">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <a class="ex ex-packages-transportation-on-a-truck" href="#"></a>
                                        </figure>
                                        <div class="entry-content">
                                            <h4 class="entry-title"><a href="#">store solutions</a></h4>
                                            <p>Tex Trucking is one of the most trusted names in trucking, and an
                                                industry leader in home</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- * -->
                            </ul>
                        </div>

                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </section>
    <!-- end our services 2 -->

    <!-- News lastest -->
    <section class="kopa-area kopa-area-7">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- widget -->
                    <div class="widget ex-module-article-2">
                        <div class="row">
                            <div class="col-xs-4 col-md-3">

                                <header class="widget-header style-07">
                                    <span class="sub-title">news &amp; blog</span>
                                    <h3 class="widget-title">
                                        LATEST<br>NEWS
                                    </h3>
                                </header>
                                <!-- navigation btn slisder -->
                                <div class="customNavigation">
                                    <a class="btn btn-prev-slider-news-lastest"><span class="ti-arrow-left"></span></a>
                                    <a class="btn btn-next-slider-news-lastest"><span class="ti-arrow-right"></span></a>
                                </div>
                                <!-- end -->

                            </div>
                            <div class="col-xs-8 col-md-9">

                                <div class="widget-content">
                                    <ul class="owl-carousel owl-theme">
                                        <li>
                                            <!-- ** -->
                                            <article class="entry-item">
                                                <div class="entry-content">
                                                    <h4 class="entry-title"><a href="#">Logistic leads the way on e-ABw
                                                            implementation</a></h4>
                                                    <p>Tex Trucking is one of the most trusted names in trucking, and an
                                                        industry leader in home delivery. Whether its many </p>

                                                    <a href="#" class="kopa-readmore">read more</a>

                                                </div>
                                            </article>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end News Lastet -->

    @if ($allCompanies->count())
    <!-- logo partner -->
    <section class="kopa-area kopa-area-8 kopa-triangle-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <!-- widget -->
                    <div class="widget ex-module-slider-2">
                        <div class="widget-content">
                            <ul class="owl-carousel owl-theme">
                                <!-- ** -->
                                @foreach($allCompanies as $company)
                                @if ($company->avatar)
                                <li>
                                    <article class="entry-item">
                                        <div class="entry-content">
                                            <figure class="entry-thumb">
                                                <a href="#">
                                                    <img src="{{ asset("uploads/{$company->avatar}") }}"
                                                        alt="{{ $company->name }}">
                                                </a>
                                            </figure>
                                        </div>
                                    </article>
                                </li>
                                @endif
                                @endforeach
                                <!-- ** -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end logo partner -->
    @endif
    <!-- get started -->
    @endsection
