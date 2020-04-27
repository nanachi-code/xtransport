<!DOCTYPE html>
<html>

<head>
    <title>TransportX Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="template language" name="keywords" />
    <meta content="Tamerlan Soziev" name="author" />
    <meta content="Admin dashboard html template" name="description" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="favicon.png" rel="shortcut icon" />
    <link href="apple-touch-icon.png" rel="apple-touch-icon" /> --}}

    @include('admin.enqueue.styles')
</head>

<body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
        <div class="layout-w">
            {{-- START - Mobile Menu --}}
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                    <a class="mm-logo" href="index.html">
                        <img src="img/logo.png" />
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
                            <img alt="" src="img/avatar1.jpg" />
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

                        {{-- User --}}
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
                    </ul>
                    {{-- END - Mobile Menu List --}}
                </div>
            </div>
            {{-- END - Mobile Menu --}}

            {{-- START - Main Menu --}}
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
                            <img src="{{ asset("uploads/".\Auth::user()->avatar) }}"
                                class="input-preview img-responsive">
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
                                    <img src="{{ asset("uploads/".\Auth::user()->avatar) }}"
                                        class="input-preview img-responsive">
                                    @else
                                    <img src="{{ asset('images/default/no-image.jpg') }}"
                                        class="input-preview img-responsive">
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

                    {{-- Company --}}
                    <li class="sub-header">
                        <span>Company</span>
                    </li>
                    <li>
                        <a href="{{ url('/admin/company/all') }}">
                            <div class="icon-w">
                                <i class="icon-docs"></i>
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

                    {{-- Event --}}
                    <li class="sub-header">
                        <span>Event</span>
                    </li>
                    <li>
                        <a href="{{ url('/admin/event/all') }}">
                            <div class="icon-w">
                                <i class="icon-docs"></i>
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

                    {{-- Feedback --}}
                    <li class="sub-header">
                        <span>Feedback</span>
                    </li>
                    <li>
                        <a href="{{ url('/admin/feedback/all') }}">
                            <div class="icon-w">
                                <i class="icon-docs"></i>
                            </div>
                            <span>Feedback</span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- END - Main Menu --}}

            {{-- START - Content --}}
            <div class="content-w">
                {{-- START - Top Bar --}}
                <div class="top-bar color-scheme-light">
                    {{-- START - Top Menu Controls  --}}
                    <div class="top-menu-controls">
                        <div class="element-search autosuggest-search-activator">
                            <input placeholder="Start typing to search..." type="text" />
                        </div>

                        {{-- START - User avatar and menu in secondary top menu --}}
                        <div class="logged-user-w">
                            <div class="logged-user-i">
                                <div class="avatar-w">
                                    @if (Auth::check())
                                    @if (\Auth::user()->avatar)
                                    <img src="{{ asset("uploads/".\Auth::user()->avatar) }}"
                                        class="input-preview img-responsive">
                                    @else
                                    <img src="{{ asset('images/default/no-image.jpg') }}"
                                        class="input-preview img-responsive">
                                    @endif
                                    @endif
                                </div>
                                <div class="logged-user-menu color-style-bright">
                                    <div class="logged-user-avatar-info">
                                        <div class="avatar-w">
                                            @if (Auth::check())
                                            @if (\Auth::user()->avatar)
                                            <img src="{{ asset("uploads/".\Auth::user()->avatar) }}"
                                                class="input-preview img-responsive">
                                            @else
                                            <img src="{{ asset('images/default/no-image.jpg') }}"
                                                class="input-preview img-responsive">
                                            @endif
                                            @endif
                                        </div>
                                        <div class="logged-user-info-w">
                                            @if (Auth::check())
                                            <div class="logged-user-name">
                                                @if (Auth::check())
                                                {{ \Auth::user()->name }}
                                                @endif
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
                                        <li>
                                            <a href="users_profile_big.html">
                                                <i class="os-icon os-icon-user-male-circle2"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}">
                                                <i class="os-icon os-icon-signs-11"></i><span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- END - User avatar and menu in secondary top menu --}}
                    </div>
                    {{-- END - Top Menu Controls --}}
                </div>
                {{-- END - Top Bar --}}

                {{-- START - Content --}}
                @yield('content')
                {{-- END - Content --}}

                {{-- START - Color Scheme Toggler --}}
                <div class="floated-colors-btn second-floated-btn">
                    <div class="os-toggler-w">
                        <div class="os-toggler-i">
                            <div class="os-toggler-pill"></div>
                        </div>
                    </div>
                    <span>Dark </span><span>Colors</span>
                </div>
                {{-- END - Color Scheme Toggler --}}

                {{-- START - Demo Customizer --}}
                <div class="floated-customizer-btn third-floated-btn">
                    <div class="icon-w">
                        <i class="os-icon os-icon-ui-46"></i>
                    </div>
                    <span>Customizer</span>
                </div>
                <div class="floated-customizer-panel">
                    <div class="fcp-content">
                        <div class="close-customizer-btn">
                            <i class="os-icon os-icon-x"></i>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Menu Settings
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Menu Position</label><select class="menu-position-selector">
                                        <option value="left">
                                            Left
                                        </option>
                                        <option value="right">
                                            Right
                                        </option>
                                        <option value="top">
                                            Top
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Menu Style</label><select class="menu-layout-selector">
                                        <option value="compact">
                                            Compact
                                        </option>
                                        <option value="full">
                                            Full
                                        </option>
                                        <option value="mini">
                                            Mini
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field with-image-selector-w">
                                    <label for="">With Image</label><select class="with-image-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Menu Color</label>
                                    <div class="fcp-colors menu-color-selector">
                                        <div class="color-selector menu-color-selector color-bright selected">
                                        </div>
                                        <div class="color-selector menu-color-selector color-dark"></div>
                                        <div class="color-selector menu-color-selector color-light"></div>
                                        <div class="color-selector menu-color-selector color-transparent"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Sub Menu
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                                        <option value="flyout">
                                            Flyout
                                        </option>
                                        <option value="inside">
                                            Inside/Click
                                        </option>
                                        <option value="over">
                                            Over
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Sub Menu Color</label>
                                    <div class="fcp-colors">
                                        <div class="color-selector sub-menu-color-selector color-bright selected">
                                        </div>
                                        <div class="color-selector sub-menu-color-selector color-dark"></div>
                                        <div class="color-selector sub-menu-color-selector color-light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Other Settings
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Full Screen?</label><select class="full-screen-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Top Bar Color</label>
                                    <div class="fcp-colors">
                                        <div class="color-selector top-bar-color-selector color-bright selected">
                                        </div>
                                        <div class="color-selector top-bar-color-selector color-dark"></div>
                                        <div class="color-selector top-bar-color-selector color-light"></div>
                                        <div class="color-selector top-bar-color-selector color-transparent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END - Demo Customizer --}}

                {{-- START - Chat Popup Box --}}
                <div class="floated-chat-btn">
                    <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
                </div>
                <div class="floated-chat-w">
                    <div class="floated-chat-i">
                        <div class="chat-close">
                            <i class="os-icon os-icon-close"></i>
                        </div>
                        <div class="chat-head">
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar1.jpg" />
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        John Mayers
                                    </h6>
                                    <div class="user-role">
                                        Account Manager
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-messages">
                            <div class="message">
                                <div class="message-content">
                                    Hi, how can I help you?
                                </div>
                            </div>
                            <div class="date-break">
                                Mon 10:20am
                            </div>
                            <div class="message">
                                <div class="message-content">
                                    Hi, my name is Mike, I will be
                                    happy to assist you
                                </div>
                            </div>
                            <div class="message self">
                                <div class="message-content">
                                    Hi, I tried ordering this
                                    product and it keeps showing me
                                    error code.
                                </div>
                            </div>
                        </div>
                        <div class="chat-controls">
                            <input class="message-input" placeholder="Type your message here..." type="text" />
                            <div class="chat-extra">
                                <a href="#"><span class="extra-tooltip">Attach Document</span><i
                                        class="os-icon os-icon-documents-07"></i></a><a href="#"><span
                                        class="extra-tooltip">Insert
                                        Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span
                                        class="extra-tooltip">Upload Video</span><i
                                        class="os-icon os-icon-ui-51"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END - Chat Popup Box --}}
            </div>
            {{-- END - Content --}}
        </div>
    </div>
    <div class="display-type"></div>
    </div>
    @yield('addition-scripts')
    @include('admin.enqueue.scripts')
</body>

</html>
