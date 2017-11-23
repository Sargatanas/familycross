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
<body>

<div class="notes-area area">
    <main class="notes-block">
        <div class="notes-block__heading">@yield('heading')</div>
        <div class="notes-block-content">
            @yield('content')
        </div>
    </main>
</div>

</body>
</html>