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
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    {{-- Bootstrap Core CSS --}}
    <link href="{{ asset('materialpro') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="{{ asset('materialpro') }}/css/style.css" rel="stylesheet">
    {{-- You can change the theme colors from here --}}
    <link href="{{ asset('materialpro') }}/css/colors/blue.css" id="theme" rel="stylesheet">
</head>
<body>
    {{-- Preloader - style you can find in spinners.css --}}
        @include('layouts.preloader')
    {{-- Main wrapper - style you can find in pages.scss --}}
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(../assets/images/background/login-register.jpg);">
      <div class="login-box card">
        <div class="card-body">
          <form class="form-horizontal form-material" id="loginform" action="index.html">
            <a href="javascript:void(0)" class="text-center db"><img src="../assets/images/logo-icon.png" alt="Home" /><br/><img src="../assets/images/logo-text.png" alt="Home" /></a>
            <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
            <div class="col-xs-12">
            <div class="form-group m-t-20">
            </div>
                <input class="form-control" type="text" required="" placeholder="Name">
              <div class="form-group ">
            </div>
                <input class="form-control" type="text" required="" placeholder="Email">
              <div class="col-xs-12">
            </div>
              </div>
            <div class="col-xs-12">
            <div class="form-group ">
            </div>
                <input class="form-control" type="password" required="" placeholder="Password">
              <div class="form-group">
            </div>
                <input class="form-control" type="password" required="" placeholder="Confirm Password">
              <div class="col-xs-12">
            </div>
              </div>
            <div class="col-md-12">
            <div class="form-group">
                  <input id="checkbox-signup" type="checkbox">
                <div class="checkbox checkbox-primary p-t-0">
                </div>
                  <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
            </div>
              </div>
            <div class="col-xs-12">
            <div class="form-group text-center m-t-20">
            </div>
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
              <div class="form-group m-b-0">
            </div>
                <p>Already have an account? <a href="login2.html" class="text-info m-l-5"><b>Sign In</b></a></p>
              <div class="col-sm-12 text-center">
            </div>
              </div>
        </div>
          </form>
    </section>
    {{-- End Wrapper --}}
    {{-- All Jquery --}}
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    {{-- Bootstrap tether Core JavaScript --}}
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    {{-- slimscrollbar scrollbar JavaScript --}}
    <script src="js/jquery.slimscroll.js"></script>
    {{-- Wave Effects --}}
    <script src="js/waves.js"></script>
    {{-- Menu sidebar --}}
    <script src="js/sidebarmenu.js"></script>
    {{-- stickey kit --}}
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    {{-- Custom JavaScript --}}
    <script src="js/custom.min.js"></script>
    {{-- Style switcher --}}
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
