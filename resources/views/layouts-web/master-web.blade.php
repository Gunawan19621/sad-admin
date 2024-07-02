<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('layouts-web.head-meta')
    @include('layouts-web.head-link')
    <link rel="stylesheet" href="{{ asset('assets-web/css/web.css') }}">
</head>

<body>
    <!-- Layout wrapper -->
    @yield('content')                   

    @include('layouts-web.script')
</body>

</html>
