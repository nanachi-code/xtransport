<div
    class="menu-w color-scheme-light color-style-default menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover">
    <div class="logo-w">
        <a class="logo" href="{{ url('/') }}">
            <div class="logo-label">
                TransportX
            </div>
        </a>
    </div>

    {{-- START - Logged in user --}}
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w">
                @if (Auth::check())
                @if (\Auth::user()->avatar)
                <img src="{{ asset("uploads/".\Auth::user()->avatar) }}" class="input-preview img-responsive">
                @else
                <img src="{{ asset('images/default/no-image.jpg') }}" class="input-preview img-responsive">
                @endif
                @endif
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    @if (Auth::check())
                    {{ \Auth::user()->name }}
                    @endif
                </div>
                <div class="logged-user-role">
                    @if (Auth::check())
                    @if (\Auth::user()->role == "admin")
                    Admin
                    @elseif (\Auth::user()->role == "super_admin")
                    Super Admin
                    @endif
                    @endif
                </div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w">
                        @if (Auth::check())
                        @if (\Auth::user()->avatar)
                        <img src="{{ asset("uploads/".\Auth::user()->avatar) }}" class="input-preview img-responsive">
                        @else
                        <img src="{{ asset('images/default/no-image.jpg') }}" class="input-preview img-responsive">
                        @endif
                        @endif
                    </div>
                    <div class="logged-user-info-w">
                        @if (Auth::check())
                        <div class="logged-user-name">
                            {{ \Auth::user()->name }}
                        </div>
                        @endif
                        @if (Auth::check())
                        <div class="logged-user-role">
                            @if (Auth::check())
                            @if (\Auth::user()->role == "admin")
                            Admin
                            @elseif (\Auth::user()->role == "super_admin")
                            Super Admin
                            @endif
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                <div class="bg-icon">
                    <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                    @if (Auth::check())
                    <li>
                        @if (Auth::check())
                        <a href="{{url('admin/user',Auth::user()->id)}}">
                            <i class="os-icon os-icon-user-male-circle2"></i><span>Profile</span>
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">
                            <i class="os-icon os-icon-signs-11"></i><span>Logout</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    {{-- END - Logged in user --}}

    <div class="element-search autosuggest-search-activator">
        <input placeholder="Start typing to search..." type="text" />
    </div>
    <h1 class="menu-page-header">
        Page Header
    </h1>
    <ul class="main-menu">
        {{-- Dashboard --}}
        <li>
            <a href="{{ url('/admin/dashboard') }}">
                <div class="icon-w">
                    <i class="icon-home"></i>
                </div>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Gallery --}}
        <li>
            <a href="{{ url('/admin/gallery') }}">
                <div class="icon-w">
                    <i class="icon-picture"></i>
                </div>
                <span>Gallery</span>
            </a>
        </li>

        {{-- Blog --}}
        <li class="sub-header">
            <span>Blog</span>
        </li>
        <li>
            <a href="{{ url('/admin/post/all') }}">
                <div class="icon-w">
                    <i class="icon-docs"></i>
                </div>
                <span>All posts</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/post/new') }}">
                <div class="icon-w">
                    <i class="icon-note"></i>
                </div>
                <span>New post</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/comment') }}">
                <div class="icon-w">
                    <i class="icon-speech"></i>
                </div>
                <span>Comment</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/category-post/all') }}">
                <div class="icon-w">
                    <i class="icon-grid"></i>
                </div>
                <span>Post category</span>
            </a>
        </li>

        {{-- Company --}}
        <li class="sub-header">
            <span>Company</span>
        </li>
        <li>
            <a href="{{ url('/admin/company/all') }}">
                <div class="icon-w">
                    <i class="icon-briefcase"></i>
                </div>
                <span>All companies</span>
            </a>
            <a href="{{ url('/admin/company/new') }}">
                <div class="icon-w">
                    <i class="icon-note"></i>
                </div>
                <span>New company</span>
            </a>
        </li>

        {{-- Product --}}
        <li class="sub-header">
            <span>Product</span>
        </li>
        <li>
            <a href="{{ url('/admin/product/all') }}">
                <div class="icon-w">
                    <i class="icon-docs"></i>
                </div>
                <span>All products</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/product/new') }}">
                <div class="icon-w">
                    <i class="icon-note"></i>
                </div>
                <span>New product</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/category-product/all') }}">
                <div class="icon-w">
                    <i class="icon-grid"></i>
                </div>
                <span>Product category</span>
            </a>
        </li>

        {{-- User --}}
        @if (\Auth::user()->role == "super_admin")
        <li class="sub-header">
            <span>User</span>
        </li>
        <li>
            <a href="{{ url('/admin/user/all') }}">
                <div class="icon-w">
                    <i class="icon-people"></i>
                </div>
                <span>All users</span>
            </a>
            <a href="{{ url('/admin/user/new') }}">
                <div class="icon-w">
                    <i class="icon-user-follow"></i>
                </div>
                <span>New user</span>
            </a>
        </li>
        @endif

        {{-- Event --}}
        <li class="sub-header">
            <span>Event</span>
        </li>
        <li>
            <a href="{{ url('/admin/event/all') }}">
                <div class="icon-w">
                    <i class="icon-calendar"></i>
                </div>
                <span>All events</span>
            </a>
            <a href="{{ url('/admin/event/new') }}">
                <div class="icon-w">
                    <i class="icon-note"></i>
                </div>
                <span>New event</span>
            </a>
        </li>

        {{-- Document --}}
        <li class="sub-header">
            <span>Document</span>
        </li>
        <li>
            <a href="{{ url('/admin/document/all') }}">
                <div class="icon-w">
                    <i class="icon-docs"></i>
                </div>
                <span>All Documents</span>
            </a>
        </li>

        {{-- Feedback --}}
        <li class="sub-header">
            <span>Feedback</span>
        </li>
        <li>
            <a href="{{ url('/admin/feedback/all') }}">
                <div class="icon-w">
                    <i class="icon-envelope-letter"></i>
                </div>
                <span>Feedback</span>
            </a>
        </li>
    </ul>
</div>
