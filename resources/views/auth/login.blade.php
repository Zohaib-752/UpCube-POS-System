@php
    $backend = asset('backend') . '/';
@endphp



<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Admin - {{ env('APP_NAME') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ env('APP_DESCRIPTION') }}" name="description" />
    <meta content="{{ env('APP_AUTHOR') }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ $backend }}assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ $backend }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ $backend }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ $backend }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    {{-- Toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ $backend }}assets/images/logo-dark.png" height="30"
                                    class="logo-dark mx-auto" alt="">
                                <img src="{{ $backend }}assets/images/logo-light.png" height="30"
                                    class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="text" id="username" name="username"
                                        :value="old('username')" required autofocus autocomplete="username"
                                        placeholder="Username">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" id="password" name="password" required
                                        autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember_me"
                                            id="remember_me">
                                        <label class="form-label ms-1"
                                            for="remember_me">{{ __('Remember me') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>
                            </div>

                            <div class="form-group mb-0 row mt-2">
                                @if (Route::has('password.request'))
                                    <div class="col-sm-7 mt-3">
                                        <a href="{{ route('password.request') }}" class="text-muted"><i
                                                class="mdi mdi-lock"></i> {{ __('Forgot your password?') }}</a>
                                    </div>
                                @endif
                                @if (Route::has('register'))
                                    <div class="col-sm-5 mt-3">
                                        <a href="{{ route('register') }}" class="text-muted"><i
                                                class="mdi mdi-account-circle"></i> {{ __('Create an account') }}</a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{ $backend }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ $backend }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ $backend }}assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ $backend }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ $backend }}assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ $backend }}assets/js/app.js"></script>

    {{-- Toaster --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

</body>

</html>
