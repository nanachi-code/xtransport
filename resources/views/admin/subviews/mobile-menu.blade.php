{{-- START - Mobile Menu --}}
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="{{ url("/")  }}">
            <span>XTransport</span>
        </a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
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
        </div>
        {{-- START - Mobile Menu List --}}
        <ul class="main-menu">
            <li>
                <a href="{{ url('/admin/dashboard') }}">
                    <div class="icon-w">
                        <i class="icon-home"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
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

            {{-- Project --}}
            <li class="sub-header">
                <span>Project</span>
            </li>
            <li>
                <a href="{{ url('/admin/project/all') }}">
                    <div class="icon-w">
                        <i class="icon-docs"></i>
                    </div>
                    <span>All projects</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/project/new') }}">
                    <div class="icon-w">
                        <i class="icon-note"></i>
                    </div>
                    <span>New project</span>
                </a>
            </li>
            </li>

            {{-- User --}}
            @if (Auth::user()->role == "super_admin")
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
            @endif
        </ul>
        {{-- END - Mobile Menu List --}}
    </div>
</div>
{{-- END - Mobile Menu --}}
