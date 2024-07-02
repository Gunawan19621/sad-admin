<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('layouts-web.head-meta')
    @include('layouts-web.head-link')
    <link rel="stylesheet" href="{{ asset('assets-web/css/style.css') }}">
</head>

<body>
    <!-- Layout wrapper -->
    @include('layouts-web.menu')
    @yield('content')   
    @include('layouts-web.footer')                

    @include('layouts-web.script')
</body>

</html>
