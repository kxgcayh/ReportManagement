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
        @yield('title')
    {{-- Bootstrap Core CSS --}}
    <link href="{{asset('materialpro')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- chartist CSS --}}
    <link href="{{asset('materialpro')}}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{asset('materialpro')}}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="{{asset('materialpro')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
        rel="stylesheet">
    {{-- This page css - Morris CSS --}}
    <link href="{{asset('materialpro')}}/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="{{asset('materialpro')}}/css/style.css" rel="stylesheet">
    {{-- You can change the theme colors from here --}}
    <link href="{{asset('materialpro')}}/css/colors/megna-dark.css" id="theme" rel="stylesheet">
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
    {{-- Preloader - style you can find in spinners.css --}}
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    @yield('content')

    {{-- All Jquery --}}
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
    {{-- Chart JS --}}
    <script src="{{asset('materialpro')}}/js/dashboard1.js"></script>
    {{-- Style switcher --}}
    <script src="{{asset('materialpro')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>

