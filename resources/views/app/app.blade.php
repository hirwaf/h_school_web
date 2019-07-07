<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', env('APP_NAME')) }}</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" media="all">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    @stack('css')
</head>
<body>
<div class="container-fluid pt-3 pb-3">
    @yield('content')
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @stack('script')
</div>
</body>
</html>
