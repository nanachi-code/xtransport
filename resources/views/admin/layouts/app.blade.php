<!DOCTYPE html>
<html>

<head>
    <title>TransportX Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
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
                @include('admin.subviews.topbar')
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
