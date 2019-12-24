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
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
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
    {{-- Main wrapper - style you can find in pages.scss --}}
    <section id="wrapper" class="login-register login-sidebar"
        style="background-image:url({{asset('materialpro')}}/assets/images/background/background1.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST"
                    action="{{ route('register') }}">
                    @csrf
                    <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="departement_id">Departement</label>
                            <select name="departement_id" id="departement_id" required
                                class="form-control {{ $errors->has('departement_id') ? 'is-invalid':'' }}">
                                <option value=""></option>
                                @foreach ($departements as $depts)
                                <option value="{{ $depts->id_departement }}">
                                    {{ ucfirst($depts->name) }}
                                </option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('depatement_id') }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="role">Role</label>
                            <select class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}" multiple
                                name="roles[]" required>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ ucfirst($role->name) }}
                                </option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('depatement_id') }}</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign
                                    In</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    {{-- End Wrapper --}}
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
    <script
        src="{{asset('materialpro')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js">
    </script>
    {{-- c3 JavaScript --}}
    <script src="{{asset('materialpro')}}/assets/plugins/d3/d3.min.js"></script>
    <script src="{{asset('materialpro')}}/assets/plugins/c3-master/c3.min.js"></script>
    {{-- Chart JS --}}
    <script src="{{asset('materialpro')}}/js/dashboard1.js"></script>
    {{-- Style switcher --}}
    <script src="{{asset('materialpro')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
