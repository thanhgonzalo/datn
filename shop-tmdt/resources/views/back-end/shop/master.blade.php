@yield('assets')
@include('back-end.layouts.header')
<body>
@include('back-end.shop.top-nav')
@include('back-end.shop.left-nav')
    @yield('content')
@include('back-end.layouts.footer')