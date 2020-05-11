@extends('main.layouts.app')

@section('title', "About Us")

@section('breadcrumb')
<!-- kopa area 24-->
<section class="kopa-area kopa-area-24 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>about us</h3>
                    <div class="breadcrumb-content">
                        <span>
                            <a itemprop="url" href="{{url('/')}}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span>
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">About us</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->
@endsection

@section('content')
<!-- kopa area 28 -->
<section class="kopa-area kopa-area-28">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 wrap-wg">
                <div class="widget ex-module-present-2">

                    <h3 class="widget-title kopa-title-10">We are logistics company operating in over <span
                            class="kopa-txt-style-02">150
                            countries</span> worldwide,<br> providing great shipping experience to our clients.</h3>

                    <div class="widget-content">

                        <article class="entry-item">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <figure class="entry-thumb">
                                        <a href="#"><img src="{{asset("/images/default/img-present2-1.jpg")}}"
                                                alt="img-present2-1">
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="entry-content ">
                                        <p>Fully insured and licensed, we are an asset-based bonded carrier specializing
                                            in shipments between Canada and the United States. Centrally located just
                                            north of the HWY 401 corridor in Guelph, Ontario, Canada</p>
                                        <p>We are a family owned company built upon the core values of steadfast
                                            reliability and an unwavering level of service. Our team of knowledgeable,
                                            friendly load planners have the experience needed to find the ideal
                                            solutions for our clients.</p>
                                        <ul>
                                            <li><i class="fa fa-check"></i><a href="#">Tailored to your needs.</a>
                                            </li>
                                            <li><i class="fa fa-check"></i><a href="#">Lead with humility and
                                                    respect.</a>
                                            </li>
                                            <li><i class="fa fa-check"></i><a href="#">Earn trust through authenticity
                                                    and accountability.</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end kopa area 28 -->
<!-- kopa area 29 -->
<section class="kopa-area kopa-area-29">
    <div class="container">
        <div class="row ct-row-06">
            <!-- ** -->
            <div class="col-xs-12 col-md-8">
                <div class="widget ex-module-present-3">
                    <div class="widget-content">
                        <ul class="ul-mh row">
                            <!-- ** -->
                            <li class="col-xs-12 col-md-6">
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            mission &amp; vision
                                        </h4>
                                        <p>
                                            Fully insured and licensed, we are an asset-based bonded carrier
                                            specializing in shipments between Canada and the United States.
                                            Centrally located just north of the HWY 401 corridor in Guelph, Ontario, Canada
                                        </p>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li class="col-xs-12 col-md-6">
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            quality policy
                                        </h4>
                                        <p>
                                            We always provide you with the best quality, meet international standards
                                            with hundreds of tests around the world and gain high praise from professionals.
                                        </p>
                                        <ul>
                                            <li><i class="fa fa-angle-right"></i><a href="#">Great logistic service
                                                    transport</a>
                                            </li>
                                            <li><i class="fa fa-angle-right"></i><a href="#">Storage group safety</a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li class="col-xs-12 col-md-6">
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            our object
                                        </h4>
                                        <ul>
                                            <li><i class="fa fa-angle-right"></i><a href="#">Great logistic service
                                                    transport</a>
                                            </li>
                                            <li><i class="fa fa-angle-right"></i><a href="#">Storage group safety</a>
                                            </li>
                                            <li><i class="fa fa-angle-right"></i><a href="#">International Shipping for
                                                    50 countries</a>
                                            </li>
                                            <li><i class="fa fa-angle-right"></i><a href="#">Lead with humility and
                                                    respect.</a>
                                            </li>
                                            <li><i class="fa fa-angle-right"></i><a href="#">Earn trust through
                                                    authenticity accountability.</a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li class="col-xs-12 col-md-6">
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <h4 class="entry-title">
                                            our values
                                        </h4>
                                        <p>
                                            Transport began providing transportation solutions to Transport’s contract
                                            warehousing customers in the 1980s and expanded over time to include
                                            dedicated transportation carriage and freight brokerage.
                                        </p>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- * -->
            <!-- ** -->
            <div class="col-xs-12 col-md-4">
                <div class="widget ex-module-slider-8">
                    <div class="widget-content">
                        <div class="carousel slide myCarouselSlider8" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target=".ex-module-slider-8 .carousel" data-slide-to="0" class=""></li>
                                <li data-target=".ex-module-slider-8 .carousel" data-slide-to="1" class="active"></li>
                                <li data-target=".ex-module-slider-8 .carousel" data-slide-to="2" class=""></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <ul class="carousel-inner" role="listbox">
                                <!-- ** -->
                                <li class="item">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <img src="{{asset("/images/default/33216426_594674690900836_5519126249164767232_o.jpg")}}" alt="img-slider8-1">
                                            <figcaption>
                                                <h3 class="entry-title">Dinh Vu</h3>
                                                <span>Managing director</span>
                                            </figcaption>
                                        </figure>
                                        <div class="entry-content">
                                            <p>Logistics professionals need to stay informed of what is happening in the
                                                industry, and how emerging trends in technology, outsourcing,
                                                regulations, and business practices can impact their jobs and companies.
                                                There is plenty of information out there; the challenge is filtering
                                                through all the noise to zero in on what is truly important and why.</p>
                                        </div>
                                    </article>
                                </li>
                                <li class="item active">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <img src="{{asset("/images/default/91569815_2617477821822988_4414869026124070912_o.jpg")}}" alt="img-slider8-1">
                                            <figcaption>
                                                <h3 class="entry-title">Ho Ly Thai</h3>
                                                <span>Technical professional</span>
                                            </figcaption>
                                        </figure>
                                        <div class="entry-content">
                                            <p>Logistics professionals need to stay informed of what is happening in the
                                                industry, and how emerging trends in technology, outsourcing,
                                                regulations, and business practices can impact their jobs and companies.
                                                There is plenty of information out there; the challenge is filtering
                                                through all the noise to zero in on what is truly important and why.</p>
                                        </div>
                                    </article>
                                </li>
                                <li class="item">
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <img src="{{asset("/images/default/28061489_2000714236835283_8996934319964566339_o.jpg")}}" alt="img-slider8-1">
                                            <figcaption>
                                                <h3 class="entry-title">Dao Ngọc Long</h3>
                                                <span>Solutions consultant</span>
                                            </figcaption>
                                        </figure>
                                        <div class="entry-content">
                                            <p>Logistics professionals need to stay informed of what is happening in the
                                                industry, and how emerging trends in technology, outsourcing,
                                                regulations, and business practices can impact their jobs and companies.
                                                There is plenty of information out there; the challenge is filtering
                                                through all the noise to zero in on what is truly important and why.</p>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * -->
        </div>
    </div>
</section>
<!-- end kopa area 29 -->
<!-- logo partner -->
<section class="kopa-area kopa-area-8 style-01">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- widget -->
                <div class="widget ex-module-slider-2">
                    <div class="widget-content">
                        <ul class="owl-carousel owl-theme">
                            <!-- ** -->
                            @foreach(\App\Company::all() as $company)
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="{{ asset("uploads/{$company->logo}") }}"
                                                    alt="{{$company->name}}">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
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
@endsection
