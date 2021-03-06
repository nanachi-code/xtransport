<!DOCTYPE html>
<html>

<head>
    <title>TransportX Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="favicon.png" rel="shortcut icon" />
    <link href="apple-touch-icon.png" rel="apple-touch-icon" /> --}}

    @include('admin.enqueue.styles')
</head>

<body>
    @yield('content')

    @include('admin.enqueue.scripts')
</body>

</html>
