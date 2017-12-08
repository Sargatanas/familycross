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

<header class="header">
    <div class="header-area">
        <nav class="header-nav_content">
            <ul class="header-nav menu nav nav_h">
                <li class="nav-item">
                    <a class="nav-button
                              @if (URL::current() == route('main'))
                                   nav-button_default"
                              @else
                                   header-nav__item" href="{{ route('main') }}"
                              @endif>
                        Главная
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-button
                              @if (URL::current() == route('notes.show'))
                                  nav-button_default "
                              @else
                                  header-nav__item" href="{{ route('notes.show') }}"
                              @endif>
                        Записи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-button
                              @if (URL::current() == route('admin.notes.show'))
                            nav-button_default "
                       @else
                       header-nav__item" href="{{ route('admin.notes.show') }}"
                    @endif>
                        Редактировать записи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-button
                              nav-button_default">
                        Страница 3
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

@yield('content')

<script src="/js/btn-ripple.js"></script>

</body>
</html>