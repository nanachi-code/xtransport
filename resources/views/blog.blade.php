@extends('layout')

@section('title',"Blogs")

@section('location')
<section class="kopa__area kopa__area--noSpace">
    <div class="container">
        <div class="widget kopa__topPage style--01">
            <div class="kopa__topPage--left">
                <div class="widget-title style--07 text--white">
                    <h3 class="primary__title">News Right Sidebar
                    </h3>
                </div>
                <!-- widget title-->
                <div class="kopa__breadcrumb style--01"><span>You are here:</span><i
                        class="fa fa-angle-double-right"></i><a href="#">News</a><i
                        class="fa fa-angle-double-right"></i><span>News Right Sidebar</span></div>
                <!-- breadcrumb-->
                <div class="kopa__topPage__back text--white"><a href="#"><i class="fa fa-long-arrow-right"></i>back</a>
                </div>
                <!-- kopa topPage back-->
            </div>
            <!-- kopa topPage left-->
            <div class="kopa__topPage--right"><img src="http://placehold.it/870x380" alt=""></div>
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
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9">
                <div class="kopa__blogList">
                    <article class="entry-item">
                        <div class="entry-thumb"><a href="#"><img src="http://placehold.it/300x200" alt=""></a></div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <header class="kopa__blogList__header"><i class="kopa__iconType fa fa-file-image-o"></i>
                                <div class="entry__title style--02"><span class="meta__category"><a
                                            href="#">News</a></span>
                                    <h2 class="entry-title"><a href="#">Trucking - Company of the Year 2014</a></h2>
                                    <span class="meta__date">19/01/2016</span>
                                </div>
                                <!-- entry title-->
                            </header>
                            <!-- kopa blog list header-->
                            <p class="text--01">Our strategically positioned warehouses and alliances with a worldwide
                                networkof ocean carriers, agents, trucking companies...</p><a href="#"
                                class="kopa__viewMore style--01">Know More</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                    <article class="entry-item">
                        <div class="entry-content">
                            <header class="kopa__blogList__header"><i class="kopa__iconType fa fa-file-text-o"></i>
                                <div class="entry__title style--02"><span class="meta__category"><a
                                            href="#">News</a></span>
                                    <h2 class="entry-title"><a href="#">Trucking - Company of the Year 2014</a></h2>
                                    <span class="meta__date">19/01/2016</span>
                                </div>
                                <!-- entry title-->
                            </header>
                            <!-- kopa blog list header-->
                            <p class="text--01">Our strategically positioned warehouses and alliances with a worldwide
                                networkof ocean carriers, agents, trucking companies as well. Sed dapibus massa vitae
                                ipsum aliquam sollicitudin. Aenean turpis leo, hendrerit quis bibendum sed, scelerisque
                                nec sem. Praesent convallis lacinia pulvinar. Vivamus tincidunt diam a lacus imperdiet
                                tempus...</p><a href="#" class="kopa__viewMore style--01">Know More</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                    <article class="entry-item">
                        <div class="entry-thumb">
                            <div class="owl-wrapper owl__nav--01">
                                <div data-slider-item="1" data-item-desktop="1" data-item-desktop-small="1"
                                    data-item-tablet="1" data-item-mobile="1" data-slider-auto="false"
                                    data-slider-navigation="true" data-slider-pagination="false"
                                    data-transition-style="false" class="owl-carousel owl-theme"
                                    style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 2400px; left: 0px; display: block;">
                                            <div class="owl-item active" style="width: 300px;">
                                                <div class="item"><img src="http://placehold.it/300x200" alt=""></div>
                                            </div>
                                            <div class="owl-item" style="width: 300px;">
                                                <div class="item"><img src="http://placehold.it/300x200" alt=""></div>
                                            </div>
                                            <div class="owl-item" style="width: 300px;">
                                                <div class="item"><img src="http://placehold.it/300x200" alt=""></div>
                                            </div>
                                            <div class="owl-item" style="width: 300px;">
                                                <div class="item"><img src="http://placehold.it/300x200" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item-->

                                    <!-- item-->

                                    <!-- item-->

                                    <!-- item-->
                                    <div class="owl-controls clickable">
                                        <div class="owl-buttons">
                                            <div class="owl-prev"></div>
                                            <div class="owl-next"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- owl-carousel-->
                            </div>
                            <!-- kopa owl carousel-->
                        </div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <header class="kopa__blogList__header"><i class="kopa__iconType fa fa-file-image-o"></i>
                                <div class="entry__title style--02"><span class="meta__category"><a
                                            href="#">News</a></span>
                                    <h2 class="entry-title"><a href="#">Trucking - Company of the Year 2014</a></h2>
                                    <span class="meta__date">19/01/2016</span>
                                </div>
                                <!-- entry title-->
                            </header>
                            <!-- kopa blog list header-->
                            <p class="text--01">Our strategically positioned warehouses and alliances with a worldwide
                                networkof ocean carriers, agents, trucking companies...</p><a href="#"
                                class="kopa__viewMore style--01">Know More</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                    <article class="entry-item">
                        <div class="entry-thumb">
                            <div class="kopa__fitVid">
                                <div class="fluid-width-video-wrapper" style="padding-top: 56.3333%;"><iframe
                                        src="https://player.vimeo.com/video/139430414?title=0&amp;byline=0&amp;portrait=0"
                                        name="fitvid0"></iframe></div>
                            </div>
                            <!-- kopa fit vid-->
                        </div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <header class="kopa__blogList__header"><i class="kopa__iconType fa fa-file-video-o"></i>
                                <div class="entry__title style--02"><span class="meta__category"><a
                                            href="#">News</a></span>
                                    <h2 class="entry-title"><a href="#">Trucking - Company of the Year 2014</a></h2>
                                    <span class="meta__date">19/01/2016</span>
                                </div>
                                <!-- entry title-->
                            </header>
                            <!-- kopa blog list header-->
                            <p class="text--01">Our strategically positioned warehouses and alliances with a worldwide
                                networkof ocean carriers, agents, trucking companies...</p><a href="#"
                                class="kopa__viewMore style--01">Know More</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                    <article class="entry-item">
                        <div class="entry-content">
                            <div class="kopa__blockQuote style--05">
                                <p class="text--02"><i>Mauris at eleifend urna, egestas varius risus. Sed augue sem,
                                        blandit nec lectus mattis, eleifend lobortis urna. Vestibulum porttitor tortor
                                        iaculis.</i></p>
                                <h6 class="kopa__blockQuote__author">Bob KERREY</h6>
                            </div>
                            <!-- kopa block quote-->
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                    <article class="entry-item">
                        <div class="entry-thumb">
                            <div class="kopa__audio">
                                <h4 class="kopa__audio__title">INSERT AUDIO TITLE</h4><span
                                    class="kopa__audio__author"><a href="#">Lily Hunter</a></span>
                                <audio controls="">
                                    <source src="audio/Boulevard.mp3" type="audio/mpeg">
                                </audio>
                            </div>
                            <!-- kopa audio-->
                        </div>
                        <!-- entry thumb-->
                        <div class="entry-content">
                            <header class="kopa__blogList__header"><i class="kopa__iconType fa fa-file-video-o"></i>
                                <div class="entry__title style--02"><span class="meta__category"><a
                                            href="#">News</a></span>
                                    <h2 class="entry-title"><a href="#">Trucking - Company of the Year 2014</a></h2>
                                    <span class="meta__date">19/01/2016</span>
                                </div>
                                <!-- entry title-->
                            </header>
                            <!-- kopa blog list header-->
                            <p class="text--01">Our strategically positioned warehouses and alliances with a worldwide
                                networkof ocean carriers, agents, trucking companies...</p><a href="#"
                                class="kopa__viewMore style--01">Know More</a>
                        </div>
                        <!-- entry content-->
                    </article>
                    <!-- entry item-->
                    <div class="kopa__pagination style--01"><span class="kopa__navAll">Page 1 of 3</span>
                        <nav role="navigation" class="navigation pagination">
                            <h2 class="screen-reader-text">Posts navigation</h2>
                            <div class="nav-links"><a href="#" class="prev page-numbers"><i
                                        class="fa fa-angle-left"></i></a><a href="#" class="page-numbers">1</a><span
                                    class="page-numbers current">2</span><a href="#" class="page-numbers">3</a><a
                                    href="#" class="next page-numbers"><i class="fa fa-angle-right"></i></a></div>
                            <!-- nav links-->
                        </nav>
                    </div>
                    <!-- kopa pagination-->
                </div>
                <!-- kopa blog list-->
            </div>
            <!-- col-->
            <div class="col-xs-12 col-sm-4 col-md-3 sidebar kopa__sideBar">
                <section class="widget widget_search">
                    <form role="search" method="get" action="/" class="search-form">
                        <label><span class="screen-reader-text">Search for:</span>
                            <input type="search" placeholder="Search …" value="" class="search-field">
                        </label>
                        <button type="submit" class="search-submit"><span
                                class="screen-reader-text">Search</span></button>
                    </form>
                </section>
                <!-- widget search-->
                <section class="widget widget_archive">
                    <div class="widget-title">
                        <h3 class="primary__title">CATEGORIES</h3>
                        <div class="kopa__line--dotted style--02"><span
                                class="kopa__line--dotted--small kopa__line--dotted--dark"></span><span
                                class="kopa__line--dotted--small kopa__line--dotted--gray"></span><span
                                class="kopa__line--dotted--small kopa__line--dotted--light"></span><span
                                class="kopa__line--dotted--wide"></span></div>
                        <!-- kopa line dotted-->
                    </div>
                    <!-- widget title-->
                    <ul>
                        <li><a href="#">April 2016</a></li>
                        <li><a href="#">April 2016</a></li>
                        <li><a href="#">April 2016</a></li>
                        <li><a href="#">April 2016</a></li>
                        <li><a href="#">April 2016</a></li>
                        <li><a href="#">April 2016</a></li>
                    </ul>
                </section>
                <!-- widget archive-->
                <section class="widget kopa__gallery style--01">
                    <div class="widget-title">
                        <h3 class="primary__title">our gallery</h3>
                        <div class="kopa__line--dotted style--02"><span
                                class="kopa__line--dotted--small kopa__line--dotted--dark"></span><span
                                class="kopa__line--dotted--small kopa__line--dotted--gray"></span><span
                                class="kopa__line--dotted--small kopa__line--dotted--light"></span><span
                                class="kopa__line--dotted--wide"></span></div>
                        <!-- kopa line dotted-->
                    </div>
                    <!-- widget title-->
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xs-4"><a href="#"><img src="http://placehold.it/80x80" alt=""></a></div>
                            <!-- col-->
                            <div class="col-xs-4"><a href="#"><img src="http://placehold.it/80x80" alt=""></a></div>
                            <!-- col-->
                            <div class="col-xs-4"><a href="#"><img src="http://placehold.it/80x80" alt=""></a></div>
                            <!-- col-->
                            <div class="col-xs-4"><a href="#"><img src="http://placehold.it/80x80" alt=""></a></div>
                            <!-- col-->
                            <div class="col-xs-4"><a href="#"><img src="http://placehold.it/80x80" alt=""></a></div>
                            <!-- col-->
                            <div class="col-xs-4"><a href="#"><img src="http://placehold.it/80x80" alt=""></a></div>
                            <!-- col-->
                        </div>
                        <!-- row-->
                    </div>
                    <!-- widget content-->
                </section>
                <!-- kopa gallery-->
                <section class="widget kopa__download style--01">
                    <div class="widget-content"><a href="#"
                            class="btn btn--sm btn--curve btn--border--thick style--06"><i
                                class="fa fa-download"></i>Download PDF</a><a href="contact.html"
                            class="btn btn--sm btn--curve btn--border--thick style--06"><i class="fa fa-skype"></i>Ask
                            our experts</a></div>
                    <!-- widget content-->
                </section>
                <!-- kopa download-->
                <section class="widget kopa__recentPost style--01">
                    <div class="widget-title">
                        <h3 class="primary__title">Recent Post</h3>
                        <div class="kopa__line--dotted style--02"><span
                                class="kopa__line--dotted--small kopa__line--dotted--dark"></span><span
                                class="kopa__line--dotted--small kopa__line--dotted--gray"></span><span
                                class="kopa__line--dotted--small kopa__line--dotted--light"></span><span
                                class="kopa__line--dotted--wide"></span></div>
                        <!-- kopa line dotted-->
                    </div>
                    <!-- widget title-->
                    <div class="widget-content">
                        <ul>
                            <li><a href="#"><img src="http://placehold.it/70x70" alt=""></a>
                                <h5 class="entry__title style--03"><a href="#">Trucking - Company of the Year 2014</a>
                                </h5><span class="entry-date">19/01/2016</span>
                            </li>
                            <li><a href="#"><img src="http://placehold.it/70x70" alt=""></a>
                                <h5 class="entry__title style--03"><a href="#">Trucking - Company of the Year 2014</a>
                                </h5><span class="entry-date">19/01/2016</span>
                            </li>
                            <li><a href="#"><img src="http://placehold.it/70x70" alt=""></a>
                                <h5 class="entry__title style--03"><a href="#">Trucking - Company of the Year 2014</a>
                                </h5><span class="entry-date">19/01/2016</span>
                            </li>
                        </ul>
                    </div>
                    <!-- widget content-->
                </section>
                <!-- kopa recent post-->
            </div>
            <!-- col-->
        </div>
        <!-- row-->
    </div>
    <!-- container-->
</section>
@endsection
