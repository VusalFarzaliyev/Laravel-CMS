<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/assets/admin/auth/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/auth/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100" style="background-image: url('public/assets/admin/auth/images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="{{"/admin"}}">
                @csrf
                <div class="wrap-input100">
                    <input value="{{old('email')}}"  class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="wrap-input100 " >
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                <hr>
                    @if (session('danger'))
                    <div class="ml-5 my-2 d-flex justify-content-between align-items-center">
                        <div class="text-danger">
                            {{ session('danger') }}
                        </div>
                    </div>
                    @endif

            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="/assets/admin/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/admin/auth/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/admin/auth/vendor/bootstrap/js/popper.js"></script>
<script src="/assets/admin/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/admin/auth/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/assets/admin/auth/vendor/daterangepicker/moment.min.js"></script>
<script src="/assets/admin/auth/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/assets/admin/auth/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
</body>
</html>
