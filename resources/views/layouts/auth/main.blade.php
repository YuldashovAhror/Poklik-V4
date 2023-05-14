<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    @if(Request::segment(1) == 'login')
        <title>Register</title>
    @else
        <title>Login</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('components.auth.styles')
</head>
<body class="authentication-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="index.html" class="mb-5 d-block auth-logo">
                            <img src="@include('components.dashboard.logo')" alt="" height="22" class="logo logo-dark">
                            <img src="@include('components.dashboard.logo')" alt="" height="22" class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.auth.scripts')
</body>
</html>