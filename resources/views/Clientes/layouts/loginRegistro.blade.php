
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css') }}" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="{{ asset('dist/icons/material-design-icons/css/mdi.min.css') }}" type="text/css">
    <!-- Google font -->
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap') }}" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="{{ asset('dist/css/latform-style-9.min.css') }}" type="text/css">
</head>
<body>

    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="form-cover" style="background: url(dist/images/cover4.jpg)"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-6 col-md-6 offset-md-6">
                            <div class="logo text-center">
                                <img src="{{ asset('dist/images/logo-black.png') }}" alt="logo">
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="{{ asset('dist/vendor/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js') }}"></script>
    <!-- Latform scripts -->
    <script src="{{ asset('dist/js/latform.min.js') }}"></script>

</body>
</html>