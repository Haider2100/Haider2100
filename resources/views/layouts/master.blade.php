<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHOTOGRAPHER @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{asset('owl-carousel/owl.carousel.css')}}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{asset('owl-carousel/owl.theme.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <script src="{{asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
    <!-- own -->
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap.min.js')}}"></script>

    @stack('css')
</head>


<body>

@include('partials.header')

@yield('content')
@yield('main-content')

@include('partials.footer')

<script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery-1.11.0.min.js')}}"><\/script>')</script>

<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<!-- Include js plugin -->
<script src="{{asset('owl-carousel/owl.carousel.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

@stack('js')
</body>
</html>
