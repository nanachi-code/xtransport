@includeIf('html.head')
<body>
@includeIf('html.header')

@yield('location')

@yield('content')

@includeIf('html.footer')

@includeIf('html.js')

@yield('script')

</body>
</html>