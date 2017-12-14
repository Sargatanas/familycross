<div class="main__logo logo logo_admin"></div>
<nav class="main-nav">
    <ul class="main-nav__content menu nav">
        <li class="menu__item">
            <a class="main-nav__item button"
               href="{{ route('main') }}">
                На главную
            </a>
        </li>
        <li class="menu__item">
            <a class="main-nav__item button"
               href="{{ route('admin.notes.show') }}">
                Записи
            </a>
        </li>
        @if (Auth::check())
            @if(Auth::user()->is_admin)
                <li class="menu__item">
                    <a class="main-nav__item button"
                       href="#">
                        Пользователи
                    </a>
                </li>
            @endif
        @endif
    </ul>
</nav>

<div class="main-block-about">
    <div class="main-block-about__content">
        <p class="text text_paragraph">
            Это меню доступно только для администратора и пользователей-редакторов.
            Добавлять новых пользователей имеет право только администратор.
        </p>
    </div>
</div>