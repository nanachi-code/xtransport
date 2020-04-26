<!-- header -->
<header class="kopa-page-header kopa-page-header-1">
    <!-- kopa-header top -->
    @includeIf('html.top-header')
    <!-- end kopa header top -->
    <!-- kopa-header-botttom -->
    @includeIf('html.bottom-header')
    <!-- end kopa-heaeder-bottom -->

    <!-- menu responsive -->
    <div class="kopa-header-responsive">
        <div class="container">
            <div class="alignleft">
                <figure class="kopa-logo">
                    <a href="#"><img src="http://placehold.it/214x44" alt="logo">
                    </a>
                </figure>
            </div>
            <div class="alignright">
                <div class="humberger-menu">
                    <i class="fa fa-bars"></i>
                </div>
                <!-- button feature -->

                <div class="kopa-wrap-hidden-content-header">
                    <button class="btn-header active-support-number style-02" data-target="number-contact-header-1"><i
                            class="fa fa-mobile"></i>
                    </button>
                    <div class="wrap-support-number style-01" data-contact="number-contact-header-1">
                        <a href="callto:">call support: 0800.123.9876</a>
                    </div>
                </div>
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
