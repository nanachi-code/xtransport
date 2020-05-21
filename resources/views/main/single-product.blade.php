@extends('main.layouts.app')

@section('title', $product->name)

@section('breadcrumb')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>{{ $product->name }}</h3>
                    <div class="breadcrumb-content">
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{ url('/') }}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{ url('/product/all') }}">
                                <span itemprop="title">Product</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">{{ $product->name }}</span>
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
<section class="kopa-area-47">
    <div class="container">
        <div class="row ct-row-06">
            <div class="col-xs-12 col-md-6">
                <!-- widget -->
                <div class="widget ex-module-slider-13">
                    <div class="widget-content">
                        <div class="owl-carousel main-img-wrap" style="text-align: -webkit-center">
                            @if (count($product->gallery))
                            @foreach ($product->gallery as $image)
                            <div class="item">
                                <img class="sp-image" src="{{ $image }}" alt="">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="row-slider">
                            <div class="owl-carousel thumb-img-wrap">
                                @foreach ($product->gallery as $image)
                                <div class="item">
                                    <a href="#">
                                        <img class="sp-thumbnail" src="{{ $image }}" alt="">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>

            <div class="col-xs-12 col-sm-6">
                <!-- widget -->
                <div class="widget ex-module-present-6">
                    <h3 class="widget-title kopa-title-4">Description</h3>
                    <div class="widget-content">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="col-xs-12 col-sm-6">
                <!-- widget -->
                <div class="widget ex-module-present-7">
                    <h3 class="widget-title kopa-title-4">Seller info</h3>
                    <div class="widget-content">
                        <p>{{ $product->company->name }}</p>
                        <ul class="ul-mh row">
                            <li class="col-sm-12" style="height: 20px;">
                                <a href="#"><i class="fa fa-envelope"></i> {{ $product->company->email }} </a>
                            </li>
                            <li class=" col-sm-12" style="height: 20px;">
                                <a href="#"><i class="fa fa-phone"></i> {{ $product->company->phone }} </a>
                            </li>
                            <li class="col-sm-12" style="height: 20px;">
                                <a href="#"><i class="fa fa-home"></i> {{ $product->company->address }} </a>
                            </li>
                            <li class="col-sm-12" style="height: 20px;">
                                <a href="{{ $product->company->website }}"><i class="fa fa-globe"></i>
                                    {{ $product->company->website }} </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</section>
@endsection
