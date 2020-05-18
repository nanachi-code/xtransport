<!-- slider section -->
<section class="slider-area">
    <nav class="main-nav-hidden">
        <h4 class="title-nav">main menu</h4>
        <ul class="main-menu-hidden">
            <li>
                <a href="index-1.html">
                    <i class="fa fa-circle" aria-hidden="true"></i> home
                </a>
            </li>

            <li class="with-sub dropdown">
                <a href="{{ url('/blog/all') }}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-circle"
                        aria-hidden="true"></i> blog</a>
                @if (count($postCategory))
                <ul class="dropdown-menu">
                    @foreach ($postCategory as $category)
                    <li><a href="{{ url("blog/{$category->id}") }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            <li>
                <a href="{{ url('product/all') }}"><i class="fa fa-circle" aria-hidden="true"></i> Product</a>
            </li>
            <li>
                <a href="{{ url('project/all') }}"><i class="fa fa-circle" aria-hidden="true"></i> Project</a>
            </li>
            <li>
                <a href="{{ url('/event') }}"><i class="fa fa-circle" aria-hidden="true"></i> Event</a>
            </li>
            <li>
                <a href="{{ url('/library') }}"><i class="fa fa-circle" aria-hidden="true"></i> Library</a>
            </li>
            <li>
                <a href="{{ url('/about-us') }}"><i class="fa fa-circle" aria-hidden="true"></i> About Us</a>
            </li>
            <li>
                <a href="{{ url('/contact') }}"><i class="fa fa-circle" aria-hidden="true"></i> Contact</a>
            </li>
        </ul>
        <div class="wrap-icon-social">
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <a href="#" class="btn-close-hidden-nav"><span aria-hidden="true" class="icon_close"></span></a>
</section>
<!-- end -->
