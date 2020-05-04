<div class="kopa-header-bottom">
    <div class="container">

        <!-- logo -->
        <div class="alignleft">

            <figure class="kopa-logo">
                <a href="#"><img src="http://placehold.it/297x62" alt="logo">
                </a>
            </figure>

        </div>
        <!-- end logo -->
        <div class="alignright">

            <!-- menu-main -->
            <nav class="main-nav style-01">

                <ul class="main-menu sf-menu sf-js-enabled sf-arrows">
                    <li class="curent-menu-item">
                        <a href="{{url('/')}}" class="sf-with-ul">home</a>
                        <!-- ==== end submenu ==== -->
                    </li>
                    <li>
                        <a href="{{url('/blog/all')}}">blog</a>
                        <!-- ==== sub menu ==== -->
                        <ul class="sub-menu">
                            @php
                            $post_category = App\CategoryPost::all();
                            @endphp
                            @isset($post_category)
                            @foreach ($post_category as $p)
                            <li>
                                <i class="fa fa-star-o"></i><a href="{{url('blog/'.$p->id)}}"
                                    class="sf-with-ul">{{$p->name}}</a>
                            </li>
                            @endforeach
                            @endisset
                        </ul>
                        <!-- ==== end submenu ==== -->
                    </li>
                    <li>
                        <a href="{{url('catalog/all')}}">Catalog</a>
                        <!-- ==== sub menu ==== -->
                        <ul class="sub-menu">
                            @php
                            $product_category = App\CategoryProduct::all();
                            @endphp
                            @isset($product_category)
                            @foreach ($product_category as $p)
                            <li>
                                <i class="fa fa-star-o"></i><a href="{{url('catalog/'.$p->id)}}"
                                    class="sf-with-ul">{{$p->name}}</a>
                            </li>
                            @endforeach
                            @endisset
                        </ul>
                        <!-- ==== end submenu ==== -->
                    </li>

                    <li>
                        <a href="contact.html">CONTACT</a>
                    </li>
                </ul>

            </nav>
            <!-- end menu-main -->
            <!-- button feature -->

            <div class="humberger-menu">
                <i class="fa fa-bars"></i>
            </div>
            <div class="kopa-wrap-hidden-content-header">
                <button class="btn-header active-support-number style-01" data-target="number-contact-header-1"><i
                        class="fa fa-phone"></i>
                </button>
                <div class="wrap-support-number style-01" data-contact="number-contact-header-1">
                    <a href="callto:">call support: 0800.123.9876</a>
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
