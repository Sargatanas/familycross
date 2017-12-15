@extends('layouts.base-header')

@section('title', 'Управление пользователями')

@section('content')
    <main class="area">
        <div class="admin-area">
            <div class="admin-area__heading">
                Список пользователей
            </div>

            <main class="admin-area__content">
                @if(filled($users))
                    @foreach ($users as $user)
                        <div class="admin-notes-block">
                            <div class="admin-notes-heading">
                                <div class="admin-notes-heading__title
                                            {{ $user->is_admin ? 'admin-notes-heading__title_admin' : ''}}">
                                    {{ $user->name }} ({{ $user->email }})
                                </div>
                                @if (!$user->is_admin)
                                    <a class="admin-notes-heading__delete admin-user__delete"
                                       type="button"
                                       href="{{ route('admin.user.delete', ['id' => $user->id]) }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="admin-notes-block">- Здесь пока нет ни одной записи-</div>
                @endif

                @include('admin.user.create')
            </main>
        </div>
    </main>
@endsection