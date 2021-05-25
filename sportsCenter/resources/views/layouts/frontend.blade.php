<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @yield('title') | Sports Center

    </title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
</head>
<body>
    @include('layouts.inc.navbar')

    <div class="content">
        @yield('content')
    </div>


    <script src="{{ asset('frontend/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
