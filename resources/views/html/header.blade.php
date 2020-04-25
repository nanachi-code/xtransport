<header class="kopa__header style--01">
    <div class="kopa__header--top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 pull-right">
                    <div class="kopa__header--right">
                        <div class="kopa__header__country pull-left">
                            <div class="active"><img src="{{asset('images/flag/flag01.jpg')}}" alt=""><i
                                    class="fa fa-angle-down"></i></div>
                            <div class="widget widget_polylang">
                                <ul>
                                    <li class="lang-item"><a href="#"><img src="{{asset('images/flag/flag01.jpg')}}"
                                                alt=""></a></li>
                                    <li class="lang-item"><a href="#"><img src="{{asset('images/flag/flag02.jpg')}}"
                                                alt=""></a></li>
                                </ul>
                            </div>
                            <!-- polylang-->
                        </div>
                        <!-- header country-->
                        <div class="kopa__header__office pull-left">
                            <div class="active"><img src="{{asset('images/icon/global.png')}}" alt=""><span>London
                                    Office</span></div>
                            <ul>
                                <li><a href="#">London Office</a></li>
                                <li><a href="#">Berlin Office</a></li>
                                <li><a href="#">Newyork Office</a></li>
                                <li><a href="#">Hanoi Office</a></li>
                            </ul>
                        </div>
                        <!-- header office-->
                        <div class="kopa__header__email pull-left"><a href="page-request.html"><i
                                    class="fa fa-envelope-o"></i>Request a quote</a></div>
                        <!-- header email-->
                        <div class="kopa__mobileMenu hidden-md hidden-lg">
                            <div class="kopa__mobileMenu__iconBar"><span></span><span></span><span></span>
                            </div>
                            <!-- kopa mobile menu icon bar-->
                            <nav>
                                <ul class="nav">
                                    <li><a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li><a href="{{url('/blogs/all')}}">Blog</a>
                                        <ul>
                                            <li><a href="{{url('/blogs/all')}}">All blogs</a></li>
                                            @php
                                            $post_cate = \App\CategoryPost::all();
                                            @endphp
                                            @isset($post_cate)
                                            @foreach($post_cate as $c)
                                            <li><a href="{{url('/blogs/'.$c->id)}}">{{$c->name}}</a></li>
                                            @endforeach
                                            @endisset
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/catalog/all')}}">Catalog</a>
                                        <ul>
                                            <li><a href="{{url('/catalog/all')}}">All items</a></li>
                                            @php
                                            $product_cate = \App\CategoryProduct::all();
                                            @endphp
                                            @isset($product_cate)
                                            @foreach ($product_cate as $c)
                                            <li><a href="{{url('/catalog/'.$c->id)}}">{{$c->name}}</a></li>
                                            @endforeach
                                            @endisset
                                        </ul>
                                    </li>
                                    <li><a href="#">About Us</a>
                                    </li>
                                    <li><a href="{{url('/contact')}}">Contacts</a></li>
                                    <li><a href="#">Our Partner</a></li>
                                </ul>
                            </nav>
                            <!-- nav-->
                        </div>
                        <!-- kopa mobile menu-->
                    </div>
                    <!-- header right-->
                </div>
                <!-- col-->
                <div class="col-xs-12 col-md-3">
                    <div class="kopa__header__logo"><a href="{{url('/')}}"><img
                                src="{{asset('images/fixed/logo01.png')}}" alt=""></a></div>
                    <!-- kopa logo-->
                </div>
                <!-- col-->
            </div>
            <!-- row-->
        </div>
        <!-- container-->
    </div>
    <!-- kopa header top-->
    <div class="kopa__header--bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 hidden-xs hidden-sm">
                    <nav class="kopa__header__mainMenu style--01">
                        <ul class="sf-menu">
                            <li><a href="{{url('/')}}">Home</a>

                            </li>
                            <li><a href="{{url('/blogs/all')}}">Blog</a>
                                <ul>
                                    <li><a href="{{url('/blogs/all')}}">All blogs</a></li>
                                    @php
                                    $post_cate = \App\CategoryPost::all();
                                    @endphp
                                    @isset($post_cate)
                                    @foreach($post_cate as $c)
                                    <li><a href="{{url('/blogs/'.$c->id)}}">{{$c->name}}</a></li>
                                    @endforeach
                                    @endisset
                                </ul>
                            </li>
                            <li><a href="{{url('/catalog/all')}}">Catalog</a>
                                <ul>
                                    <li><a href="{{url('/catalog/all')}}">All items</a></li>
                                    @php
                                    $product_cate = \App\CategoryProduct::all();
                                    @endphp
                                    @isset($product_cate)
                                    @foreach ($product_cate as $c)
                                    <li><a href="{{url('/catalog/'.$c->id)}}">{{$c->name}}</a></li>
                                    @endforeach
                                    @endisset
                                </ul>
                            </li>
                            <li><a href="#">About Us</a>

                                <!-- sf mega-->
                            </li>
                            <li><a href="{{url('/contact')}}">Contacts</a></li>

                        </ul>
                    </nav>
                    <!-- kopa header mainMenu-->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="kopa__header--bottom--right">
                        <div id="sb-search" class="kopa__header__search sb-search">
                            <form>
                                <input placeholder="Search..." type="text" value="" name="search"
                                    class="sb-search-input">
                                <button type="submit" class="search-submit"><span
                                        class="sb-icon-search fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- kopa header search-->
                        <div class="kopa__header--bottom--right__list">
                            <ul>
                                <li>
                                    <a href="#">our Partner</a>

                                </li>
                            </ul>
                        </div>
                        <!-- kopa header bottom right list-->
                        <div class="kopa__header--bottom--right__list">
                            <ul>
                                @if (Auth::User())
                                <li><a href="#">My Account<i class="fa fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{url('user/profile')}}">My Profile</a></li>
                                        <li><a href="{{url('/logout')}}">Logout</a></li>
                                    </ul>
                                </li>
                                @else <li><a href="{{url('/login')}}">Login</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <!-- kopa header bottom right-->
                </div>
            </div>
        </div>
    </div>
    <!-- kopa header bottom-->
</header>
<!-- kopa__header-->
