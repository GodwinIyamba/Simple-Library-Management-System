<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Book4Rent Admin Login</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{('backend/assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('backend/assets/css/oneui.min.css')}}">

</head>
<body>

<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="content">
                <div class="row justify-content-center push">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign In Block -->
                        <div class="block block-rounded mb-0">
                            <div style="text-align: center; background-color: #dee2e6; color:#6c757d ; padding: .625rem 1.25rem; border-top-right-radius: .25rem;
  border-top-left-radius: .25rem;
} ">
                                <h1 class="h2 mb-1">Admin Login</h1>
                            </div>
                            <div class="block-content">
                                <div class="">
                                    <form class="js-validation-signin" action="{{ route('admin.access') }}" method="POST">
                                        @csrf
                                        <div class="py-3">
                                            <div class="mb-4">
                                                <input type="email" class="form-control form-control-alt form-control-lg" id="login-username" name="email" placeholder="email@email.com">
                                            </div>
                                            <div class="mb-4">
                                                <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn w-100 btn-alt-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!--
    OneUI JS

    Core libraries and functionality
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="{{ asset('backend/assets/js/oneui.app.min.js')}}"></script>

<!-- jQuery (required for jQuery Validation plugin) -->
<script src="{{ asset('backend/assets/js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('backend/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{ asset('backend/assets/js/pages/op_auth_signin.min.js')}}"></script>
</body>
</html>


{{--<form action="{{ route('admin.access') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <div>--}}
{{--        <label for="">Email</label>--}}
{{--        <input type="email" name="email">--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label for="">password</label>--}}
{{--        <input type="password" name="password" id="password">--}}
{{--    </div>--}}
{{--    <input type="submit" value="log in">--}}
{{--</form>--}}
