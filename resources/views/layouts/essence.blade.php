<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title  -->
    <title> فروشگاه آنلاین </title>

    <!-- Favicon  -->
    <link rel="icon" type="image/png" href="{{asset('img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('essence/css/essence.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area" dir="ltr">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar d-flex justify-content-end" id="essenceNav" dir="rtl">
                <form class="form-inline" action="{{url('shop')}}" method="get">
                    <input type="text" name="q" value="{{request('q')}}" placeholder="جستجوی محصول" class="form-control">
                    <button type="submit" class="btn btn-primary mx-1"> <i class="fa fa-search"></i> جستجو </button>
                </form>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Favourite Area -->
                <div class="favourite-area" title="صفحه اصلی فروشگاه" data-toggle="tooltip">
                    <a href="{{url('/')}}"><img src="{{asset('essence/img/core-img/store.png')}}" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info" title="ناحیه کاربری" data-toggle="tooltip">
                    <a href="{{url('home')}}"><img src="{{asset('essence/img/core-img/user.svg')}}" alt=""></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div id="right-side-cart-area" class="right-side-cart-area">
        @include('store.partials.basket')
    </div>
    <!-- ##### Right Side Cart End ##### -->


    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        made with
                        <i class="fa fa-heart-o" aria-hidden="true"></i> by
                        <a href="http://tihootech" target="_blank">TihooTech</a>
                    </p>
                </div>
            </div>

        </div>

    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('essence/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('essence/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('essence/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('essence/js/plugins.js')}}"></script>
    <!-- Classy Nav js -->
    <script src="{{asset('essence/js/classy-nav.min.js')}}"></script>
    <!-- Essence js -->
    <script> documentRoot = '{{url('/')}}' </script>
    <script src="{{asset('essence/js/essence.js')}}"></script>
    <script src="{{asset('essence/js/ajax.js')}}"></script>

</body>

</html>
