<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | {{ __("Login") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/UBold/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('public/assets/UBold/css/bootstrap-saas.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('public/assets/UBold/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('public/assets/UBold/css/bootstrap-saas-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('public/assets/UBold/css/app-saas-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{ asset('public/assets/UBold/css/icons.min.css') }}"  rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">
                    @yield('content')
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                    	<div class="pb-1" style="color: white">
                    	<a href="{!! route('user.change-language', ['en']) !!}" style="color: white"><span>English</span></a>
                    	| 
                     	<a href="{!! route('user.change-language', ['it']) !!}" style="color: white"><span>Italian</span></a>
                     	</div>
                        <p> <a href="auth-recoverpw.html" class="text-white-50 ml-1">{{ __("Forgot your password?") }}</a></p>
                        <p class="text-white-50">{{ __("Dont have an account?") }} <a href="{{route('register')}}" class="text-white ml-1"><b>{{ __("Sign Up") }}</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<footer class="footer footer-alt text-white-50">
    2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
</footer>

<!-- Vendor js -->
<script src="{{ asset('public/assets/UBold/js/vendor.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('public/assets/UBold/js/app.min.js') }}"></script>

</body>
</html>
