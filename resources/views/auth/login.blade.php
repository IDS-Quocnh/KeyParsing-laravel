@extends('layouts.app')
@section('content')
    <div class="card-body p-4">
        <div class="text-center w-75 m-auto">
            <div class="auth-logo">
                <a href="index.html" class="logo logo-dark text-center">
                <span class="logo-lg">
                    <img src="../assets/images/logo-dark.png" alt="" height="22">
                </span>
                </a>

                <a href="index.html" class="logo logo-light text-center">
                <span class="logo-lg">
                    <img src="../assets/images/logo-light.png" alt="" height="22">
                </span>
                </a>
            </div>
            <p class="text-muted mb-4 mt-3">{{ __('Enter your email address and password to access admin panel.') }}</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group mb-3">
                <label for="emailaddress">{{ __('Email address') }}</label>
                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="{{ __('Enter your email') }}">
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <div class="form-group mb-3">
                <label for="password">{{ __('Password') }}</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Enter your password') }}">
                    <div class="input-group-append" data-password="false">
                        <div class="input-group-text">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                    <label class="custom-control-label" for="checkbox-signin">{{ __('Remember me') }}</label>
                </div>
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit"> {{ __('Log In') }} </button>
            </div>

        </form>

        <div class="text-center">
            <h5 class="mt-3 text-muted">{{ __('Sign in with') }}</h5>
            <ul class="social-list list-inline mt-3 mb-0">
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                </li>
            </ul>
        </div>
    </div> <!-- end card-body -->
@endsection