<!-- header -->
<header class="kopa-page-header kopa-page-header-1">
    <!-- kopa-header top -->
    <div class="kopa-header-top">
        <div class="container">

            <div class="alignleft">
                <p>WORKING HOURS: Mon - Sat 0900 - 1900</p>
            </div>
            <div class="alignright">
                <div class="kopa-item-header">
                    <a class="kopa-email-link" href="mailto:">Emai: contact@transportx.com</a>
                </div>
                <div class="kopa-item-header">
                    <ul class="kopa-social-links">
                        <li>
                            <a href="#" class="fa fa-twitter"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-facebook-official"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-rss"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-google-plus"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end kopa header top -->

    <!-- kopa-header-botttom -->
    <div class="kopa-header-bottom">
        <div class="container">
            <!-- logo -->
            <div class="alignleft">
                <figure class="kopa-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset("/images/default/logo.png") }}" alt="logo">
                    </a>
                </figure>
            </div>
            <!-- end logo -->
            <div class="alignright">

                <!-- menu-main -->
                <nav class="main-nav style-01">

                    <ul class="main-menu sf-menu sf-js-enabled sf-arrows">
                        <li class="curent-menu-item">
                            <a href="{{ url('/') }}" class="sf-with-ul">Home</a>
                            <!-- ==== end submenu ==== -->
                        </li>
                        <li>
                            <a href="{{ url('/blog/all') }}">Blog</a>
                            @if (count($postCategory))
                            <!-- ==== sub menu ==== -->
                            <ul class="sub-menu">
                                @foreach ($postCategory as $category)
                                <li>
                                    <i class="fa fa-star-o"></i>
                                    <a href="{{ url("blog/{$category->id}") }}"
                                        class="sf-with-ul">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- ==== end submenu ==== -->
                            @endif
                        </li>
                        <li>
                            <a href="{{ url('product/all') }}">Product</a>
                        </li>
                        <li>
                            <a href="{{ url('project/all') }}">Project</a>
                        </li>
                        <li>
                            <a href="#">Event</a>
                            <ul class="sub-menu">
                                <li>
                                    <i class="fa fa-star-o"></i>
                                    <a href="{{ url('/event') }}">Upcoming Event</a>
                                </li>
                                <li>
                                    <i class="fa fa-star-o"></i>
                                    <a href="{{ url('/event/old') }}">Old Event</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/library') }}">Library</a>
                        </li>
                        <li>
                            <a href="{{ url('/about-us') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- end menu-main -->
                <!-- button feature -->

                <div class="humberger-menu">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="kopa-wrap-hidden-content-header">
                    <div class="dropdown">
                        <button class="btn-header active-support-number style-01" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (Auth::check())
                            <ul>
                                <li><a href="{{ url('user/profile') }}" class="dropdown-item pl-2">My Profile</a></li>
                                <hr>
                                <li><a href="{{ url('/logout') }}" class="dropdown-item">Logout</a></li>
                            </ul>
                            @else
                            <li><a href="{{ url('/login') }}" class="dropdown-item">Login</a></li>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kopa-wrap-hidden-content-header">
                    <button class="btn-header active-form-search style-01" data-target="form-search-header-1"><i
                            class="fa fa-search"></i>
                    </button>
                    <!-- ============================================ ==================================== -->
                    <!-- hidden content -->
                    <div class="wrap-hidden-content form-search-hidden" data-form="form-search-header-1">
                        <div class="container">

                            <form action="#" class="search-form-1" method="get">
                                <button type="submit" class="ct-submit-1"><i class="fa fa-search"></i>
                                </button>
                                <input class="search-text" type="text" onblur="if (this.value == '')
                                                                     this.value = this.defaultValue;" onfocus="if (this.value == this.defaultValue)
                                                                     this.value = '';" value="Search..."
                                    placeholder="Search..." name="s">
                            </form>
                            <span class="btn-off fa fa-times"></span>

                        </div>
                    </div>
                    <!-- end -->
                    <!-- ============================================ ==================================== -->
                </div>

                <!-- end button feature -->

            </div>

        </div>
    </div>
    <!-- end kopa-heaeder-bottom -->

    <!-- menu responsive -->
    <div class="kopa-header-responsive">
        <div class="container">
            <div class="alignleft">
                <figure class="kopa-logo">
                    <a href="#"><img src="{{ asset("/images/default/logo.png") }}" alt="logo">
                    </a>
                </figure>
            </div>
            <div class="alignright">
                <div class="humberger-menu">
                    <i class="fa fa-bars"></i>
                </div>

                <!-- button feature -->
                <div class="kopa-wrap-hidden-content-header">
                    <button class="btn-header active-form-search style-02" data-target="form-search-header-1"><i
                            class="fa fa-search"></i>
                    </button>

                    <div class="wrap-hidden-content form-search-hidden" data-form="form-search-header-1">
                        <div class="container">

                            <form action="#" class="search-form-1" method="get">
                                <button type="submit" class="ct-submit-1"><i class="fa fa-search"></i>
                                </button>
                                <input class="search-text" type="text" onblur="if (this.value == '')
                                                         this.value = this.defaultValue;" onfocus="if (this.value == this.defaultValue)
                                                         this.value = '';" value="Search..." placeholder="Search..."
                                    name="s">
                            </form>
                            <span class="btn-off fa fa-times"></span>

                        </div>
                    </div>
                </div>
                <!-- end button feature -->
            </div>
        </div>
    </div>
</header>
<!-- end header -->
