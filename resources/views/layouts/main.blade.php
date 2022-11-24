<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') | BLT Profile Matching</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dist/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('dist/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('dist/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">



</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        @include('components.navbar')

        @include('components.sidebar')

        @yield('content')

        @include('components.footer')

    </div>

    <!-- Required vendors -->
    <script src="{{asset('dist/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('dist/js/quixnav-init.js')}}"></script>
    <script src="{{asset('dist/js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{asset('dist/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('dist/vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('dist/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('dist/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('dist/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('dist/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('dist/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('dist/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('dist/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('dist/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('dist/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('dist/js/dashboard/dashboard-1.js')}}"></script>

</body>

</html>