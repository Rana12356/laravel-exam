<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora || @yield('title')</title>

    @include('front.includes.css')
</head>
<body>

@include('front.includes.header')

@include('front.includes.menu')

@yield('body')

@include('front.includes.footer')

@include('front.includes.js')
</body>
</html>
