@extends('main.layouts.app')

@section('title',"Post")

@section('breadcrumb')
<section class="kopa-area kopa-area-34 white-text-style">
    <div class="container">
        <div class="row">
            <div class="kopa-breadcrumb">
                <h3>{{ $company->name }}</h3>
                <div class="breadcrumb-content">
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/') }}">
                            <span itemprop="title">Home</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" href="{{ url('/blog') }}">
                            <span itemprop="title">Blog</span>
                        </a>
                    </span>
                    <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                    <span itemtype="" itemscope="">
                        <a itemprop="url" class="current-page">
                            <span itemprop="title">{{ $company->name }}</span>
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
                            <h4 class="entry-title">{{ $company->name }}</h4>

                        </header>
                        <div class="entry-thumb">
                            <div class="entry-thumb embed-responsive embed-responsive-16by9">
                                <img src="{{ asset('uploads/'.$company->logo) }}" alt="">
                            </div>
                        </div>
                        <div class="entry-content">
                            {!! $company->introduction !!}
                        </div>
                        <article class="entry-item py-4">
                            <div class="entry-content">
                                <div class="kopa-intro-box kopa-intro-box-4 clearfix">
                                    <div class="intro-box-content">
                                        <h4 class="intro-box-title kopa-heading4">Contact information</h4>
                                        <p class="intro-box-sub-title kopa-heading5">Address: {{$company->address}}</p>
                                        <p>Email: {{$company->email}}</p>
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
            <!-- end main col -->
            <!-- sidebar -->
            <div class="col-xs-12 col-md-3 sidebar kopa-col-respon-2">
                <div class="row ct-row-06">
                    <div class="col-xs-12 kopa-col-respon-1 col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0">
                        <!-- widget -->
                        <div class="widget ex-module-slider-9">
                            <div class="widget-content">
                                <div class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 1578px; left: 0px; display: block;">
                                            <div class="owl-item" style="width: 263px;">
                                                <article class="entry-item">
                                                    <figure class="entry-thumb">
                                                        <img src="http://placehold.it/270x286" alt="">
                                                    </figure>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="#">face the<br>
                                                                challenges<br>
                                                                of chain<br>
                                                                complexity</a>
                                                        </h4>
                                                        <p>friday, august 7, 2015</p>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 263px;">
                                                <article class="entry-item">
                                                    <figure class="entry-thumb">
                                                        <img src="http://placehold.it/270x286" alt="">
                                                    </figure>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="#">face the<br>
                                                                challenges<br>
                                                                of chain<br>
                                                                complexity</a>
                                                        </h4>
                                                        <p>friday, august 7, 2015</p>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 263px;">
                                                <article class="entry-item">
                                                    <figure class="entry-thumb">
                                                        <img src="http://placehold.it/270x286" alt="">
                                                    </figure>
                                                    <div class="entry-content">
                                                        <h4 class="entry-title">
                                                            <a href="#">face the<br>
                                                                challenges<br>
                                                                of chain<br>
                                                                complexity</a>
                                                        </h4>
                                                        <p>friday, august 7, 2015</p>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- navigation btn slisder -->
                                <div class="customNavigation">
                                    <a class="btn prev btn-prev-slider9"><i class="fa fa-angle-left"></i></a>
                                    <a class="btn next btn-next-slider9"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    <div class="col-xs-12">
                        <!-- widget -->
                        <div class="widget ex-module-contact-9 widget_search">
                            <header class="widget-header style-09">
                                <h3 class="widget-title"><span>subcribe</span></h3>
                                <span class="sub-title">Follow my lastest news</span>
                            </header>
                            <div class="widget-content">
                                <div class="ct-form-box newsleter-form-box">
                                    <form action="processForm.php" method="post" novalidate="novalidate"
                                        class="ct-form-3">
                                        <p class="input-block input-email clearfix">
                                            <input type="text" value="Your email"
                                                onfocus="if(this.value=='Your email')this.value='';"
                                                onblur="if(this.value=='')this.value='Your email';" name="email"
                                                class="valid">
                                            <button type="submit"><i class="fa fa-envelope"></i>
                                            </button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    <div class="col-xs-12">
                        <!-- widget -->
                        <div class="widget ex-module-article-list-1">
                            <header class="widget-header style-09">
                                <h3 class="widget-title"><span>popular post</span></h3>
                            </header>
                            <div class="widget-content">
                                <ul class=" ul-mh">
                                    <!-- ** -->
                                    <li style="">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/60x60" alt="">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="#">Shipping cargo<br> across the
                                                        ocean</a></h4>
                                                <div class="entry-meta">
                                                    <p class="entry-date">
                                                        july 5, 2015
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    <!-- ** -->
                                    <li style="">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/60x60" alt="">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="#">Why Community Management Is
                                                        Different From Social Media</a></h4>
                                                <div class="entry-meta">
                                                    <p class="entry-date">
                                                        july 5, 2015
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                    <!-- ** -->
                                    <li style="">
                                        <article class="entry-item">
                                            <figure class="entry-thumb">
                                                <a href="#"><img src="http://placehold.it/60x60" alt="">
                                                </a>
                                            </figure>
                                            <div class="entry-content">
                                                <h4 class="entry-title"><a href="#">Be Succesful With Your Social Media
                                                        Marketing Strategy</a></h4>
                                                <div class="entry-meta">
                                                    <p class="entry-date">
                                                        july 5, 2015
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
            <!-- end side bar -->
        </div>
    </div>
</section>
@endsection
