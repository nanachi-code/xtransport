<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- stylesheet start --}}
    @include('main.enqueue.styles')
    {{-- stylesheet start --}}
</head>

<body>
    {{-- header start --}}
    @include('main.subviews.header')
    {{-- header end --}}

    {{-- breadcrumb start --}}
    @yield('breadcrumb')
    {{-- breadcrumb end --}}

    {{-- content start --}}
    @yield('content')
    {{-- content end --}}

    {{-- footer start --}}
    @include('main.subviews.footer')
    {{-- footer end --}}

    {{-- scripts start --}}
    @include('main.enqueue.scripts')
    @yield('additional-scripts')
    {{-- scripts end --}}
</body>

</html>
