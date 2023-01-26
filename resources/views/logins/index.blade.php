<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login 411192094 DISTRIBUTOR</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/logo/logoUndira_Favicon.png') }}">


    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('/css/app.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('/images/others/login-3.png') }}');">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            @if (session()->has('loginError'))
                            <div class="alert alert-danger">
                                <div class="d-flex justify-content-start">
                                    <span class="alert-icon m-r-20 font-size-30">
                                        <i class="anticon anticon-close-circle"></i>
                                    </span>
                                    <div>
                                        <h5 class="alert-heading">Login Error</h5>
                                        <p>{{ session('loginError') }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="{{ asset('/images/logo/logoUndira.png') }}">
                                        <h2 class="m-b-0">Sign In</h2>
                                    </div>
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" autofocus>
                                            </div>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <a class="float-right font-size-13 text-muted" href="">Forget Password?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                            </div>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Don't have an account?
                                                    <a class="small" href="/register"> Signup</a>
                                                </span>
                                                <button class="btn btn-primary">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2023 411192094_Aditya Dwi Aprianto</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>