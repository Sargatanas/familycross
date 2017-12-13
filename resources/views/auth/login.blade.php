@php
    /** @var string $exist */
@endphp

@extends('layouts.base')

@section('title', 'Вход')

@section('content')
<div class="area login">
    <form class="login-block"
          method="POST"
          action="{{ route('login.exist') }}">
        {{ csrf_field() }}

        <div class="login-block__heading">Вход в систему</div>

        <div class="login-block__element login-block-username">
            <label for="user"
                   class="login-block__label">
                Логин
            </label>
            <input type="text"
                   class="login-block__input"
                   id="user"
                   name="user"
                   value="{{ old("user") }}"
                   required
                   oninvalid="this.setCustomValidity('Пожалуйста, заполните это поле')"
                   autocomplete="off">
        </div>

        <div class="login-block__element login-block-password">
            <label for="password"
                   class="login-block__label">
                Пароль
            </label>
            <input type="password"
                   class="login-block__input"
                   id="password"
                   name="password"
                   value="{{ old("password") }}"
                   required
                   oninvalid="this.setCustomValidity('Пожалуйста, заполните это поле')">
        </div>

        @if (session('exist'))
            <div class="login-block__error">
                Имя пользователя и/или пароль указаны неверно
            </div>
        @endif

        <div class="login-block__submit admin-notes-add-buttons">
            <input type="submit"
                   class="admin-notes-add-buttons__element"
                   value="Войти">
        </div>
    </form>
</div>

@endsection
