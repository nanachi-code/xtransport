@extends('layout')

@section('title',"Catalogs")

@section('location')
<section class="kopa__area kopa__area--noSpace">
    <div class="container">
        <div class="widget kopa__topPage style--01">
            <div class="kopa__topPage--left">
                <div class="widget-title style--07 text--white">
                    <h3 class="primary__title">Shop 1
                    </h3>
                </div>
                <!-- widget title-->
                <div class="kopa__breadcrumb style--01"><span>You are here:</span><i
                        class="fa fa-angle-double-right"></i><a href="#">Pages</a><i
                        class="fa fa-angle-double-right"></i><span>Shop 1</span></div>
                <!-- breadcrumb-->
                <div class="kopa__topPage__back text--white"><a href="#"><i class="fa fa-long-arrow-right"></i>back</a>
                </div>
                <!-- kopa topPage back-->
            </div>
            <!-- kopa topPage left-->
            <div class="kopa__topPage--right"><img src="http://placehold.it/870x380" alt="">
            </div>
            <!-- kopa topPage right-->
        </div>
        <!-- kopa topPage-->
    </div>
    <!-- container-->
</section>
@endsection

@section('content')
<section class="kopa__area kopa__area--08">
    <div class="container">
        <div class="kopa__shopFilter">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <form action="/" method="get" class="woocommerce-ordering">
                        <select name="orderby" class="orderby">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>
                    <!-- woocommerce ordering-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-6 col-md-3 pull-right">
                    <p class="woocommerce-result-count">Showing all 1 results</p>
                </div>
                <!-- col-->
            </div>
            <!-- row-->
        </div>
        <!-- kopa shop filter-->
        <div class="kopa__shopItem">
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a>
                            <div class="kopa__shopItem__icon new"><span>new</span></div>
                            <!-- kopa shop item icon-->
                        </div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a>
                            <div class="kopa__shopItem__icon sale"><span>sale</span></div>
                            <!-- kopa shop item icon-->
                        </div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-sm-3">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/270x340" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <h5><a href="#">This is product name</a></h5>
                            <div class="kopa__shopItem__rating"><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                                    class="fa fa-star-o"></i>
                            </div>
                            <!-- kopa shop item raing-->
                            <del>£32</del><ins>£22</ins><a href="#"
                                class="btn btn--md btn--curve btn__color--primary">buy Know</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                </div>
                <!-- col-->
            </div>
            <!-- row-->
            <div class="kopa__pagination style--01"><span class="kopa__navAll">Page 1 of 3</span>
                <nav role="navigation" class="navigation pagination">
                    <h2 class="screen-reader-text">Posts navigation</h2>
                    <div class="nav-links"><a href="#" class="prev page-numbers"><i class="fa fa-angle-left"></i></a><a
                            href="#" class="page-numbers">1</a><span class="page-numbers current">2</span><a href="#"
                            class="page-numbers">3</a><a href="#" class="next page-numbers"><i
                                class="fa fa-angle-right"></i></a></div>
                    <!-- nav links-->
                </nav>
            </div>
            <!-- kopa pagination-->
        </div>
        <!-- kopa shop item-->
    </div>
    <!-- container-->
</section>
@endsection
