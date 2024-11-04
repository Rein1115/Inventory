<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./logonibayicon.png">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="h-100" style="background: linear-gradient(to right, #ff7f7f, #8b0000);">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0" style="box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.3);">
                            <div class="card-body pt-5">
                                <div class="text-center">
                                    <img src="./logonibay.png" alt="Logo" class="img-fluid text-center" style="max-height: 150px; width: auto;"> <!-- Added img-fluid class -->
                                </div>
                              

                                @if (session('message'))
                                    <div class="alert alert-danger text-center" role="alert">
                                       <i class="fa fa-exclamation-circle"></i> {{ session('message') }}
                                    </div>
                                @endif
        

                                <form method="POST" action="{{ route('login') }}" class="mt-5 mb-5 login-input">
                                    @csrf

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback d-block mt-2">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback d-block mt-2">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn login-form__btn submit w-100 mt-4">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <p class="mt-3 login-form__footer">
                                            <a href="{{ route('password.request') }}" class="text-primary">{{ __('Forgot Your Password?') }}</a>
                                        </p>
                                    @endif

                                </form>
                                {{-- <p class="mt-5 login-form__footer">Don't have an account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
