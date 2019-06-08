<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/dataTables.min.css') }}">
    @yield('styles')
</head>
<body>
@include('partials.header')
@yield('content')

<script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>