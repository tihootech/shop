<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/pdp.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/dashmain.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> {{website('title')}} </title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        @yield('content')
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset("js/pdp.min.js")}}"></script>
    <script src="{{asset('dashboard/js/dashmain.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('dashboard/js/plugins/pace.min.js')}}"></script>
</body>

</html>
