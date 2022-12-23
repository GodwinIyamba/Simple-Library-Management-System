<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Book4Rent</title>

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('backend/assets/css/oneui.min.css')}}">
    <!-- END Stylesheets -->
</head>
<body>
-->
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <!-- END Side Overlay -->
    @include('admin.body.sidebar')
    <!-- END Sidebar -->

    <!-- Header -->
    @include('admin.body.header')
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('main')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
{{--    @include('admin.body.footer')--}}
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<script src="{{ asset('backend/assets/js/oneui.app.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{ asset('backend/assets/js/pages/be_pages_dashboard.min.js')}}"></script>
</body>
</html>

