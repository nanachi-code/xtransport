@extends('layout')

@section('title',"Product Archives")

@section('location')
<section class="kopa-area kopa-area-44 white-text-style">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="kopa-breadcrumb">
                    <h3>Products</h3>
                    <div class="breadcrumb-content">
                        <span itemtype="" itemscope="">
                            <a itemprop="url" href="{{url('/')}}">
                                <span itemprop="title">Home</span>
                            </a>
                        </span>
                        <span>&nbsp; &nbsp; / &nbsp; &nbsp;</span>
                        <span itemtype="" itemscope="">
                            <a itemprop="url" class="current-page">
                                <span itemprop="title">Products</span>
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
                            @if ($allCategories->count())
                            @foreach ($allCategories as $category)
                            <li role="presentation">
                                <a href="#" data-val="{{ $category->id }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </header>
                    <div class="kopa-gallery kopa-gallery-2">
                        <div class="gallery-content clearfix">
                            <ul class="ul-mh row ct-row-01 masonry-container-2"
                                style="position: relative; height: 860px;">
                                @if ($products->count())
                                @foreach ($products as $product)
                                <!-- mansory item -->
                                <li class="ms-item-01 col-xs-6 col-sm-6 col-md-3 show" @if ($product->category)
                                    data-val="{{ $product->category->id }}"
                                    @else
                                    data-val="0"
                                    @endif
                                    style="height: 264px; position: absolute; left: 870px; top: 573px;">
                                    <!-- ** -->
                                    <article class="entry-item">
                                        <figure class="entry-thumb">
                                            <a href="{{ url("/product/detail/{$product->id}") }}">
                                                @if ($product->thumbnail)
                                                <img src="{{ url("uploads/{$product->thumbnail}") }}" alt="">
                                                @else
                                                <img src="{{ asset("images/default/no-image.jpg") }}" alt="">
                                                @endif
                                            </a>

                                        </figure>
                                        <div class="entry-content">
                                            <h4 class="entry-title">
                                                <a href="{{ url("/product/detail/{$product->id}") }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h4>
                                            <a href="{{url("/product/detail/{$product->id}") }}"
                                                class="kopa-btn btn-01">
                                                view detail
                                            </a>
                                        </div>
                                    </article>
                                    <!-- * -->
                                </li>
                                <!-- end -->
                                @endforeach
                                @else
                                <h6>No products found.</h6>
                                @endif
                            </ul>
                        </div>
                    </div>
                    {{ $products->links('html.paginate') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
