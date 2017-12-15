<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FamilyCross</title>

    {{--Icons--}}
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">

    {{--Styles--}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="body main">

<main class="main-area">
    <a class="to-author to-author_vk"
       href="https://vk.com/family_cross"
       title="Связаться с автором"
       target="_blank">
    </a>
    @if (!Auth::check())
        <a class="to-login main__to-login"
           href="{{ route('login') }}">
            Вход
        </a>
    @else
        <a class="to-login main__to-login"
           href="{{ route('logout') }}">
            Выход
        </a>
    @endif

    @yield('content')
</main>

<script src="/js/btn-ripple.js"></script>

</body>
</html>