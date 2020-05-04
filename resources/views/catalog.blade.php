@extends('layout')

@section('title',"Catalogs")

@section('location')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>{{$location}}</h3>
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
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">{{$location}}</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- kopa area 45 -->
<section class="kopa-area-45">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="masonry-gallery">
                    <header class="kopa-tab kopa-tab-2 masonry-header">
                        <ul class="nav masonry-filter-2">
                            <li role="presentation" class="active"><a href="#" data-val="*">All</a>
                            </li>
                            <li role="presentation"><a href="#" data-val="1">Short trucks </a>
                            </li>
                            <li role="presentation"><a href="#" data-val="2">Prime trucks </a>
                            </li>
                            <li role="presentation"><a href="#" data-val="3">Big load trucks</a>
                            </li>
                        </ul>
                    </header>
                    <div class="kopa-gallery kopa-gallery-2">
                        <div class="gallery-content clearfix">
                            <ul class="ul-mh row ct-row-01 masonry-container-2"
                                style="position: relative; height: 860px;">
                                <!-- mansory item -->
                                @foreach ($items as $item)
                                <li class="ms-item-01 col-xs-6 col-sm-6 col-md-3 show" data-val="2"
                                    style="height: 264px; position: absolute; left: 870px; top: 573px;">
                                    <!-- ** -->
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <a href="{{url('/item/'.$item->id)}}"><img src="http://placehold.it/282x275"
                                                    alt="">
                                            </a>

                                        </figure>
                                        <div class="entry-content">
                                            <h4 class="entry-title"><a
                                                    href="{{url('/item/'.$item->id)}}">{{$item->name}}</a></h4>
                                            <a href="{{url('/item/'.$item->id)}}" class="kopa-btn btn-01">view
                                                detail</a>

                                        </div>
                                    </article>
                                    <!-- * -->

                                </li>
                                @endforeach
                                <!-- end -->
                            </ul>
                        </div>
                    </div>
                    {{ $items->links('html.paginate') }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- logo partner -->
<section class="kopa-area kopa-area-8">
    <div class="container-fluid">
        <div class="row">
            <!-- widget -->
            <div class="col-xs-12">
                <div class="widget ex-module-slider-2">
                    <div class="widget-content">
                        <ul class="owl-carousel owl-theme  clearfix slider-partner">
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                            <!-- ** -->
                            <li>
                                <article class="entry-item">
                                    <div class="entry-content">
                                        <figure class="entry-thumb">
                                            <a href="#"><img src="http://placehold.it/238x66" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                </article>
                            </li>
                        </ul>
                        <!-- navigation btn slisder -->
                        <div class="customNavigation">
                            <a class="btn prev"><span class="ti-arrow-left"></span></a>
                            <a class="btn next"><span class="ti-arrow-right"></span></a>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end logo partner -->
@endsection
