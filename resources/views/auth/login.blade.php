<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashmain.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> ورود به حساب کاربری </title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover" @isset($admin_login) style="background-color:#e83e8c" @endisset ></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1 class="dinar">
                @isset($admin_login)
                    ورود ادمین
                @else
                    Website Title
                @endisset
            </h1>
        </div>
        @include('partials.errors')
        <div class="login-box">
            <form class="login-form" action="{{ route('login') }}" method="post">

                @csrf

                <h3 class="login-head">
                    <i class="fa fa-lg fa-fw fa-info-circle"></i>
                    ورود ادمین
                </h3>
                <div class="form-group">
                    <label class="control-label"> <i class="fa fa-phone ml-1"></i> شماره تماس</label>
                    <input class="form-control" name="phone" type="text" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label class="control-label"> <i class="fa fa-lock ml-1"></i> رمز عبور </label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remember"><span class="label-text"> مرا به خاطر بسپار </span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip"> فراموشی رمز عبور </a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn {{isset($admin_login) ? 'btn-rose' : 'btn-primary'}} btn-block">
                        <i class="fa fa-sign-in fa-lg fa-fw"></i> ورود
                    </button>
                </div>
                <div class="text-center mt-3">
                    <p class="semibold-text mb-2">
                        <a href="{{url("register")}}"> <i class="fa fa-user-plus ml-1"></i> ایجاد حساب کاربری </a>
                    </p>
                </div>
            </form>
            <form class="forget-form" action="{{url('forgot_password')}}" method="post">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i> فراموشی رمز عبور </h3>
                <div class="form-group">
                    <label class="control-label"> <i class="fa fa-phone ml-1"></i> شماره تماس </label>
                    <input class="form-control" type="text" name="phone">
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn {{isset($admin_login) ? 'btn-rose' : 'btn-primary'}} btn-block">
                        <i class="fa fa-unlock fa-lg fa-fw"></i> بازیابی
                    </button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0 text-left">
                        <a href="#" data-toggle="flip"><i class="fa fa-angle-right fa-fw"></i> بازگشت به قسمت ورود </a>
                    </p>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/dashmain.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('dashboard/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>
