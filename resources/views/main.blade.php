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
       title="Связаться с автором">
    </a>
    <div class="main__logo logo"></div>
    <nav class="main-nav">
        <ul class="main-nav__content menu nav">
            <li class="menu__item">
                <a class="main-nav__item button button_default">
                    Об авторе
                </a>
            </li>
            <li class="menu__item">
                <a class="main-nav__item button"
                   href="{{ route('notes.show') }}">
                    Записи
                </a>
            </li>
        </ul>
    </nav>
    <div class="main-block-about">
        <div class="main-block-about__heading">О сайте</div>
        <div class="main-block-about__content">
            <p class="text text_paragraph">
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
            </p>
            <p class="text text_paragraph">
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
                Здесь будет располагаться текст о наполнении этого сайта.
            </p>
        </div>
    </div>
</main>

<script src="/js/btn-ripple.js"></script>

</body>
</html>
