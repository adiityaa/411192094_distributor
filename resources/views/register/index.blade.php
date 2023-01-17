<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>411192094 DISTRIBUTOR</title>

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
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="{{ asset('/images/logo/logoUndira.png') }}">
                                        <h2 class="m-b-0">Sign Up</h2>
                                    </div>
                                    <form action="/register" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="name">Name:</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                            <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                            @error('confirmPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-15">
                                                <span class="font-size-13 text-muted">
                                                    Already registered?
                                                    <a class="small" href="/login"> Signin</a>
                                                </span>
                                                <button class="btn btn-primary pull-right">Sign Up</button>
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