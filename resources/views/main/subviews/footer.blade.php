<div class="bottom-sidebar white-text-style">
    <!-- slogan -->
    <section class="kopa-area kopa-area-11 white-text-style">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget ex-module-contact-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-9">
                                <h4 class="widget-title kopa-title-8">We are flexible experts dedicated to
                                    serving you and your traffic needs.</h4>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="widget-content">
                                    <a href="{{ url('/contact') }}" class="kopa-btn btn-02">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slogan -->
    <!-- list module bottom-sidebar -->
    <section class="kopa-area bottom-sidebar-area">
        <div class="container">
            <ul class="ul-mh row">
                <li class="col-xs-6 col-sm-6 col-md-3" style="height: 263px;">
                    <div class="widget ex-module-contact-5">
                        <h3 class="widget-title kopa-title-11">NEWSLETTER</h3>
                        <div class="widget-content">
                            <article class="entry-item">
                                <div class="entry-content">
                                    <!-- form newsletter -->
                                    <form class="ct-form-2 clearfix" action="processForm.php" method="post"
                                        novalidate="novalidate">
                                        <p class="input-block input-email alignleft">
                                            <input type="text" value="Enter your email"
                                                onfocus="if(this.value=='Enter your email')this.value='';"
                                                onblur="if(this.value=='')this.value='Enter your email';" name="email"
                                                class="valid">
                                        </p>
                                        <p class="input-block btn-block kopa-txt-center alignleft">
                                            <input type="submit" value="Go" class="ct-submit-2">
                                        </p>
                                    </form>
                                    <!-- end -->
                                    <p><i class="fa fa-map-marker"></i> FPT APTECH, Ha Noi - Viet Nam</p>
                                    <p><i class="fa fa-phone"></i><a href="callto:"> 0123-567-890</a>
                                    </p>
                                    <p>
                                        <i class="fa fa-envelope-o"></i>
                                        <a href="mailto:contact@transportx.com">
                                            contact@transportx.com
                                        </a>
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </li>
                <li class="col-xs-6 col-sm-6 col-md-3 ct-col-01" style="height: 263px;">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title kopa-title-11">LINKS</h3>
                        <ul>
                            <li>
                                <a href="{{ url('/blog/all') }}"><i class="fa fa-circle"></i>Blog</a>
                            </li>
                            <li>
                                <a href="{{ url('product/all') }}"><i class="fa fa-circle"></i>Products</a>
                            </li>
                            <li>
                                <a href="{{ url('/event') }}"><i class="fa fa-circle"></i>Event</a>
                            </li>
                            <li>
                                <a href="{{ url('/library') }}"><i class="fa fa-circle"></i>Library</a>
                            </li>
                            <li>
                                <a href="{{ url('/about-us') }}"><i class="fa fa-circle"></i>About Us</a>
                            </li>
                            <li>
                                <a href="{{ url('/contact') }}"><i class="fa fa-circle"></i>Contact</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="col-xs-6 col-sm-6 col-md-3" style="height: 263px;">
                </li>
                <li class="col-xs-6 col-sm-6 col-md-3" style="height: 263px;">
                    <div class="widget ex-module-introduce-1">
                        <div class="widget-content">
                            <article class="entry-item">
                                <figure class="entry-thumb">
                                    <a href="{{url("/")}}">
                                        <img src="{{ asset("images/default/logo-invert.png") }}" alt="logo-footer">
                                    </a>
                                </figure>
                                <div class="entry-content">
                                    <p>
                                        TransportX is a system for developing public transport services that help cities
                                        build an advanced transportation network, improve traffic quality.
                                    </p>
                                    <div class="social-icon-box">
                                        <a href="https://twitter.com/" class="fa fa-twitter"></a>
                                        <a href="https://www.facebook.com/" class="fa fa-facebook-official"></a>
                                        <a href="https://rss.com/" class="fa fa-rss"></a>
                                        <a href="https://www.google.com/" class="fa fa-google-plus"></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- end -->
</div>
