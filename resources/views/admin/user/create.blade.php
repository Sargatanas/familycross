<form class="admin-add" id="users" name="users"
      method="POST" action="{{ route('admin.users.create') }}">
    {{ csrf_field() }}

    <div class="admin-add__heading">Создать пользователя</div>

    <div class="admin-add__content">
        <div class="admin-add-element">
            <label for="name" class="admin-add-element__label">
                Имя пользователя
            </label>

            <input id="name"
                   type="text"
                   class="admin-add-element__input
                      {{ $errors->has('name') ? 'admin-notes-add-field__input_error' : '' }}"
                   name="name"
                   value="{{ old('name') }}"
                   autofocus
                   required>
        </div>

        <div class="admin-add-element">
            <label for="email" class="admin-add-element__label">
                E-mail
            </label>

            <input id="email"
                   type="email"
                   class="admin-add-element__input
                      {{ $errors->has('email') ? 'admin-notes-add-field__input_error' : '' }}"
                   name="email"
                   value="{{ old('email') }}"
                   required>
        </div>

        <div class="admin-add-element">
            <label for="password" class="admin-add-element__label">
                Пароль
            </label>

            <input id="password"
                   type="password"
                   class="admin-add-element__input
                      {{ $errors->has('password') ? 'admin-notes-add-field__input_error' : '' }}"
                   name="password"
                   value="{{ old('password') }}"
                   required>
        </div>

        <div class="admin-add-element">
            <label for="re_password" class="admin-add-element__label">
                Повтор пароля
            </label>

            <input id="re_password"
                   type="password"
                   class="admin-add-element__input
                      {{ $errors->has('password') ? 'admin-notes-add-field__input_error' : '' }}"
                   name="re_password"
                   value="{{ old('password') }}"
                   required>
        </div>

        @if (session('error'))
            <div class="admin-add__error">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="admin-add__success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-add__button">
            <button type="submit"
                    class="admin-notes-add-buttons__element
                           admin-notes-add-buttons__element_margin-0
                           admin-notes-add-block__button">
                Создать
            </button>
        </div>
    </div>
</form>