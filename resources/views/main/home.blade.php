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
                                            <a href="{{ url("project/all") }}"><span class="ex ex-archive"></span></a>
                                        </div>
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <a href="{{ url("project/all") }}">
                                                    Browse our works</a>
                                            </h4>
                                            <p>
                                                We have done more than 100 projects for many clients around the
                                                world and all of our works has recieved positive feedback!
                                            </p>

                                            <a href="{{ url("project/all") }}" class="kopa-btn btn-09">LEARN MORE</a>

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

    <!-- Feature and our services -->
    <section class="kopa-area kopa-area-5 white-text-style">

        <div class="row ul-mh ct-row-05">
            <!-- widget feature -->
            <div class="col-xs-12 col-md-6 ct-col-03">

                <div class="widget ex-module-list-product-1">
                    <header class="widget-header style-05">
                        <span class="sub-title">Partner</span>
                        <h3 class="widget-title">
                            featured products
                        </h3>
                    </header>
                    <div class="widget-content">
                        <ul class="row ct-row-05">
                            @foreach ($featuredProducts as $product)
                            <li class="col-xs-6 col-sm-6 col-md-6">
                                <article class="entry-item">
                                    <figure class="entry-thumb">
                                        <a href="{{ url("product/detail/{$product->id}") }}">
                                            <img class="" src="{{ url("uploads/{$product->thumbnail}") }}"
                                                alt="img-feature1">
                                        </a>
                                        <figcaption>
                                            <a href="{{ url("product/detail/{$product->id}") }}">
                                                {{ $product->name }}
                                            </a>
                                        </figcaption>
                                    </figure>
                                </article>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <!-- and widget feature -->
            <!-- widget our services -->
            <div class="col-xs-12 col-md-6 ct-col-05">

                <div class="widget ex-module-our-services-1">
                    <header class="widget-header style-06">
                        <span class="sub-title">About us</span>
                        <h3 class="widget-title">
                            WE OFFER QUICK &amp;<br>
                            POWERFUL SOLUTION<br>
                            FOR TRANSPORT
                        </h3>
                    </header>
                    <div class="widget-content">
                        <ul>
                            <!-- ** -->
                            <li>
                                <article class="entry-item our-service-item">
                                    <figure class="entry-thumb">
                                        <a class="ex ex-archive" href="{{ url("about-us") }}"></a>
                                    </figure>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="{{ url("about-us") }}">Specialized Expertise</a>
                                        </h4>
                                        <p>We live and breathe traffic. Our professionals are experts in the industry
                                            giving us the knowledge and ability to focus
                                            on the details that make projects excellent.</p>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item our-service-item">
                                    <figure class="entry-thumb">
                                        <a class="ex ex-map" href="{{ url("about-us") }}"></a>
                                    </figure>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="{{ url("about-us") }}">Tailored Solutions</a>
                                        </h4>
                                        <p>No two projects are alike. We provide customized products tailored
                                            specifically to your needs. Our philosophy of doing
                                            the right thing - the right way - the first time saves our clients time and
                                            money.</p>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item our-service-item">
                                    <figure class="entry-thumb">
                                        <a class="ex ex-technical-support" href="{{ url("about-us") }}"></a>
                                    </figure>
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            <a href="{{ url("about-us") }}">Responsive Client Services</a>
                                        </h4>
                                        <p>Our clients are our greatest priority. We operate based on the principle that
                                            frequent and pro-active communication with
                                            the client is paramount to the success of any project.</p>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                        </ul>

                        <a href="{{ url("about-us") }}" class="kopa-btn btn-014">Read more</a>
                    </div>
                </div>

            </div>
            <!-- end widget our services -->
        </div>

    </section>
    <!-- end Feature and our services -->

    <!-- total info -->
    <section class="kopa-area kopa-area-6 white-text-style">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget ex-module-total-info-1">
                        <div class="widget-content">
                            <ul class="row ul-mh">
                                <!-- ** -->
                                <li class="col-xs-6 col-md-3">
                                    <article class="entry-item">
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <span class="counter">50</span>
                                            </h4>
                                            <p>years of experience.</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li class="col-xs-6 col-md-3">
                                    <article class="entry-item">
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <span class="counter">{{ $allCompanies->count() }}</span>
                                            </h4>
                                            <p>partners.</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li class="col-xs-6 col-md-3">
                                    <article class="entry-item">
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <span class="counter">{{ $allProjects->count() }}</span>
                                            </h4>
                                            <p>projects done.</p>
                                        </div>
                                    </article>
                                </li>
                                <!-- ** -->
                                <li class="col-xs-6 col-md-3">
                                    <article class="entry-item">
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <span class="counter">{{ $allEvents->count() }}</span>
                                            </h4>
                                            <p>events hosted.</p>
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
    <!-- end total info -->

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
                                @if ($allPosts->count())
                                <div class="widget-content">
                                    <ul class="owl-carousel owl-theme">
                                        @foreach ($allPosts as $post)
                                        <li>
                                            <!-- ** -->
                                            <article class="entry-item">
                                                <div class="entry-content">
                                                    <h4 class="entry-title">
                                                        <a href="{{ url("blog/post/{$post->id}") }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h4>
                                                    <p>{{ $post->excerpt }}</p>

                                                    <a href="{{ url("blog/post/{$post->id}") }}"
                                                        class="kopa-readmore">read more</a>
                                                </div>
                                            </article>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @else
                                <h6>No posts found.</h6>
                                @endif
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
