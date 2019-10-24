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
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('materialpro')}}/assets/images/favicon.png">
        <title>RPMan</title>
        {{-- Bootstrap Core CSS --}}
        <link rel="stylesheet" href="{{asset('materialpro')}}/assets/plugins/bootstrap/css/bootstrap.min.css">
        {{-- chartist CSS --}}
        <link rel="stylesheet" href="{{asset('materialpro')}}/assets/plugins/chartist-js/dist/chartist.min.css">
        <link rel="stylesheet" href="{{asset('materialpro')}}/assets/plugins/chartist-js/dist/chartist-init.css">
        <link rel="stylesheet" href="{{asset('materialpro')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css">
        {{-- This page css - Morris CSS --}}
        <link rel="stylesheet" href="{{asset('materialpro')}}/assets/plugins/c3-master/c3.min.css">
        {{-- Vector CSS --}}
        <link href="{{asset('materialpro')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{asset('materialpro')}}/css/style.css">
        {{-- You can change the theme colors from here --}}
        <link rel="stylesheet" id="theme" href="{{asset('materialpro')}}/css/colors/blue.css">
    </head>

    <body class="fix-header fix-sidebar card-no-border logo-center">
        {{-- Preloader - style you can find in spinners.css --}}
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>

        {{-- Main wrapper - style you can find in pages.scss --}}
        <div id="main-wrapper">

            @guest
                @if (Route::has('register'))

                @endif
            @else
            @endguest

            {{-- Topbar header - style you can find in pages.scss --}}
            @include('inc.navbar')

                {{-- Page wrapper --}}
                <div class="page-wrapper">
                    @yield('content')

                    {{-- Right Sidebar --}}
                    @include('inc.right-sidebar')
                </div>

            {{-- End Page wrapper --}}

            {{-- Footer --}}
            @include('inc.footer')

            {{-- Left Sidebar - style you can find in sidebar.scss --}}
            @include('inc.left-sidebar')

        </div>
        {{-- End Wrapper --}}

        {{-- All jquery --}}
        <script src="{{asset('materialpro')}}/assets/plugins/jquery/jquery.min.js"></script>
        {{-- Bootstrap tether Core JavaScript --}}
        <script src="{{asset('materialpro')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{asset('materialpro')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        {{-- slimscrollbar scrollbar JavaScript --}}
        <script src="{{asset('materialpro')}}/js/jquery.slimscroll.js"></script>
        {{-- Wave Effects --}}
        <script src="{{asset('materialpro')}}/js/waves.js"></script>
        {{-- Menu sidebar --}}
        <script src="{{asset('materialpro')}}/js/sidebarmenu.js"></script>
        {{-- stickey kit --}}
        <script src="{{asset('materialpro')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="{{asset('materialpro')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="{{asset('materialpro')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        {{-- Custom JavaScript --}}
        <script src="{{asset('materialpro')}}/js/custom.min.js"></script>

        {{-- This page plugins --}}
        {{-- chartist chart --}}
        <script src="{{asset('materialpro')}}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
        <script src="{{asset('materialpro')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
        {{-- c3 JavaScript --}}
        <script src="{{asset('materialpro')}}/assets/plugins/d3/d3.min.js"></script>
        <script src="{{asset('materialpro')}}/assets/plugins/c3-master/c3.min.js"></script>
        {{-- Vector map JavaScript --}}
        <script src="{{asset('materialpro')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="{{asset('materialpro')}}/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="{{asset('materialpro')}}/js/dashboard2.js"></script>
        {{-- Chart JS --}}
        <script src="{{asset('materialpro')}}/js/dashboard1.js"></script>
        {{-- Style switcher --}}
        <script src="{{asset('materialpro')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    </body>
</html>
