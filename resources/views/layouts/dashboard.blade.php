<!DOCTYPE html>
<html lang="fa">

<head>

    <?php // TODO: dont forget to fix the head ?>
    <title>پنل مدیریت </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <?php // TODO: favicon ?>
    <link href="{{asset('landing/img/brand/favicon.ico')}}" rel="icon" type="image/png">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/font-awesome.min.css")}}">

    {{-- <!-- Plugins--> --}}

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/fonts.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/snipps.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/pdp.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/cats-treeview.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("dashboard/css/dashmain.css?v=3")}}">

</head>

<body class="app sidebar-mini rtl">

    @include("dashboard.header")
    @include("dashboard.aside")

    <main class="app-content">
        @include('partials.flash')
        @include('partials.errors')
        @yield('main')
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{asset("dashboard/js/jquery-3.2.1.min.js")}}"></script>
    <script src="{{asset("dashboard/js/jq-ui.js")}}"></script>
    <script src="{{asset("dashboard/js/popper.min.js")}}"></script>
    <script src="{{asset("dashboard/js/bootstrap.min.js")}}"></script>

    <!-- Plugins -->
    <script src="{{asset("dashboard/js/plugins/pace.min.js")}}"></script>
    <script src="{{asset("dashboard/js/plugins/sweetalert.min.js")}}"></script>
    <script src="{{asset("dashboard/js/plugins/select2.min.js")}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{asset("dashboard/js/plugins/locationpicker.jquery.min.js")}}"></script>

    <!-- Main -->
    <script src="{{asset("dashboard/js/cats-treeview.js")}}"></script>
    <script src="{{asset("js/pdp.min.js")}}"></script>
    <script src="{{asset("dashboard/js/dashmain.js?v=3")}}"></script>
    <script src="{{asset("dashboard/js/plugins/chart.js")}}"></script>

    @isset($charts)
        @include('dashboard.charts')
    @endisset

    <script type="text/javascript">
        documentRoot = '{{url('/')}}';
    </script>
    <script>
        $('.map').locationpicker({
            location: {
                latitude: {{ $the_map->map_lat ?? '35.7509001' }},
                longitude: {{ $the_map->map_long ?? '51.385432' }}
            },
            radius: 0,
            zoom: {{ $the_map->map_zoom ?? 5 }},
            inputBinding: {
                latitudeInput: $('#map-lat'),
                longitudeInput: $('#map-long')
            },
            onchanged: function(currentLocation, radius, isMarkerDropped) {
                var mapContext = $(this).locationpicker('map');
	            $('#map-zoom').val(mapContext.map.zoom);
            }
        });
    </script>

</body>

</html>
