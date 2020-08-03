<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('title')</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="65">

<!-- Header-->
@include('includes.header')
<!-- Header Ends-->
@yield('content')

</body>

<!--    Bootstrap-->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" defer></script>

<!--    owl-carousel-->
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}" ></script>

<!-- Waypoints -->
<script src="{{asset('js/waypoints/jquery.waypoints.min.js')}}"></script>

<!-- Responsive Tabs JS -->
<script src="{{asset('js/responsive-tabs/jquery.responsiveTabs.min.js')}}"></script>

<!-- Counter -->
<script src="{{asset('js/counter/jquery.counterup.min.js')}}"></script>

<!--    Custom Script-->
<script src="{{ asset('js/script_1.js') }}" defer></script>

</html>
