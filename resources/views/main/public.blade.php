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
        @if(Auth::check())
            <li class="menu__item">
                <a class="main-nav__item button"
                   href="{{ route('admin') }}">
                    Администрирование
                </a>
            </li>
        @endif
    </ul>
</nav>
<div class="main-block-about">
    <div class="main-block-about__heading">О сайте</div>
    <div class="main-block-about__content">
        <p class="text text_paragraph">
            Этот сайт прендназначен для хранения и предоставления информации в разных областях: веб-программирование,
            дизайн, создание векторых иллюстраций и т.д. 
        </p>
    </div>
</div>