@php
    $backend = asset('backend') . '/';
@endphp

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Admin - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.description') }}" name="description" />
    <meta content="{{ config('app.author') }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ $backend }}assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ $backend }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ $backend }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ $backend }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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

                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="text" id="name" name="name"
                                        :value="old('name')" required autocomplete="name" placeholder="Full Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="text" id="username" name="username"
                                        :value="old('username')" required autocomplete="Username"
                                        placeholder="Username">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="email" id="email" name="email"
                                        :value="old('email')" required autocomplete="Email" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" id="password" name="password" required
                                        autocomplete="new-password" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" id="password_confirmation"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
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

</body>

</html>
