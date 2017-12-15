<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{--Icons--}}
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">

    {{--Styles--}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="body">

@include('layouts.elements.header')

@yield('content')

<script src="/js/btn-ripple.js"></script>

</body>
</html>