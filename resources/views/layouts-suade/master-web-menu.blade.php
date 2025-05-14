<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('layouts-suade.head-meta')
    @include('layouts-suade.head-link')
    <link rel="stylesheet" href="{{ asset('assets-web/css/style.css') }}">
</head>

<body>
    <!-- Layout wrapper -->
    @yield('content')
    @include('layouts-suade.footer')

    @include('layouts-suade.script')
</body>

</html>
