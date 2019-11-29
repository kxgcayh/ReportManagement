<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Favicon icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('materialpro') }}/assets/images/favicon.png">
    @yield('title')
    {{-- Bootstrap Core CSS --}}
    <link href="{{ asset('materialpro') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- chartist CSS --}}
    <link href="{{ asset('materialpro') }}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{ asset('materialpro') }}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="{{ asset('materialpro') }}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="{{ asset('materialpro') }}/assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    {{-- Vector CSS --}}
    <link href="{{ asset('materialpro') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    {{-- Custom CSS --}}
    <link href="{{ asset('materialpro') }}/css/style.css" rel="stylesheet">
    {{-- You can change the theme colors from here --}}
    <link href="{{ asset('materialpro') }}/css/colors/megna.css" id="theme" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar card-no-border logo-center">
    {{-- Preloader - style you can find in spinners.css --}}
        @include('inc.preloader')
    {{-- Main wrapper - style you can find in pages.scss --}}
    <div id="main-wrapper">
        @guest
        {{-- Topbar header - style you can find in pages.scss --}}
            @include('inc.topbar')
        {{-- End Topbar header --}}
        @else

        {{-- Topbar header - style you can find in pages.scss --}}
            @include('inc.topbar')
        {{-- End Topbar header --}}

        {{-- Left Sidebar - style you can find in sidebar.scss  --}}
            @include('inc.left-sidebar')
        {{-- End Left Sidebar - style you can find in sidebar.scss  --}}

        {{-- Page wrapper  --}}
        <div class="page-wrapper">
            {{-- Container fluid  --}}
            <div class="container-fluid">
                {{-- !Please add breadcumb components --}}

                {{-- Start Page Content /with Row--}}
                    @yield('content')
                {{-- End Page Content --}}

                {{-- Right sidebar --}}
                    @include('inc.right-sidebar')
                {{-- End Right sidebar --}}
            </div>
            {{-- End Container fluid  --}}

            {{-- footer --}}
                @include('inc.footer')
            {{-- End footer --}}

        @endguest
        </div>
        {{-- End Page wrapper  --}}
    </div>
    {{-- End Wrapper --}}

    {{-- All Jquery --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/jquery/jquery.min.js"></script>
    {{-- Bootstrap tether Core JavaScript --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('materialpro') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    {{-- slimscrollbar scrollbar JavaScript --}}
    <script src="{{ asset('materialpro') }}/js/jquery.slimscroll.js"></script>
    {{-- ave Effects --}}
    <script src="{{ asset('materialpro') }}/js/waves.js"></script>
    {{-- enu sidebar --}}
    <script src="{{ asset('materialpro') }}/js/sidebarmenu.js"></script>
    {{-- tickey kit --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('materialpro') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    {{-- tickey kit --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('materialpro') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('materialpro') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    {{-- Custom JavaScript --}}
    <script src="{{ asset('materialpro') }}/js/custom.min.js"></script>
    {{-- This page plugins --}}
    {{-- chartist chart --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{ asset('materialpro') }}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    {{-- Vector map JavaScript --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ asset('materialpro') }}/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{{ asset('materialpro') }}/js/dashboard3.js"></script>
    {{-- Style switcher --}}
    <script src="{{ asset('materialpro') }}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
