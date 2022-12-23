<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{{ asset('frontend/css/magnific-popup.css')}}}" type="text/css" />

    {{--    Font Awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- DatePicker CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/components/datepicker.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Book4Rent</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->

    <!-- #header end -->
    @include('frontend.body.header')

    <!-- Content
    ============================================= -->
    @yield('main')
    <!-- #content end -->

    <!-- Footer
    ============================================= -->
    @include('frontend.body.footer')
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="{{ asset('frontend/js/jquery.js')}}"></script>
<script src="{{ asset('frontend/js/plugins.min.js')}}"></script>

<!-- DatePicker JS -->
<script src="{{ asset('frontend/js/components/datepicker.js')}}"></script>

<!-- Bootstrap File Upload Plugin -->
<script src="{{ asset('frontend/js/components/bs-filestyle.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{ asset('frontend/js/functions.js')}}"></script>
@yield('script')


</body>
</html>
