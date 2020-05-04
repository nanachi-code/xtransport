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
    {{-- <link href="favicon.png" rel="shortcut icon" />\
    <link href="apple-touch-icon.png" rel="apple-touch-icon" /> --}}

    {{-- START - Stylesheets --}}
    @include('admin.enqueue.styles')
    {{-- END - Stylesheets --}}
</head>

<body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
        <div class="layout-w">

            @include('admin.subviews.mobile-menu')


            {{-- START - Main Menu --}}
            @include('admin.subviews.menu')
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

                {{-- START - Dark Mode Toggler --}}
                @include('admin.subviews.darkmode')
                {{-- END - Dark Mode Toggler --}}

                {{-- START - Customizer --}}
                @include('admin.subviews.customizer')
                {{-- END - Customizer --}}

                {{-- START - Chat Box --}}
                @include('admin.subviews.chat')
                {{-- END - Chat Box --}}
            </div>
            {{-- END - Content --}}
        </div>
    </div>
    <div class="display-type"></div>
    </div>
    {{-- START - Scripts --}}
    @include('admin.enqueue.scripts')
    @yield('additional-scripts')
    {{-- END - Scripts --}}
</body>

</html>
