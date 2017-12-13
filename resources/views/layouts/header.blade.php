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
                            nav-button_default"
                       @else
                       header-nav__item" href="{{ route('notes.show') }}"
                    @endif>
                    Записи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-button
                              @if (URL::current() == route('admin.notes.show'))
                            nav-button_default"
                       @else
                       header-nav__item" href="{{ route('admin.notes.show') }}"
                    @endif>
                    Редактировать записи
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>