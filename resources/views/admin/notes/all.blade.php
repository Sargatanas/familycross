@php
    /** @var \App\Note[] $notes */
@endphp

@extends('layouts.base-header')

@section('title', 'Записки на площадке')

@section('content')
    <div class="area admin-area">
        <div class="admin-area-notes">
            <div class="admin-area-notes__heading">
                Администрирование записок
            </div>
            <main class="admin-area-notes__content">
                @if(filled($notes))
                    @foreach ($notes as $note)
                        <div class="admin-notes-block">
                            <div class="admin-notes-heading">
                                <div class="admin-notes-heading__title">
                                    {{ $note->title }}
                                </div>
                                <a class="admin-notes-heading__edit"
                                   type="button"
                                   href="{{ route('admin.note.show', ['id' => $note->id]) }}">
                                </a>
                                <a class="admin-notes-heading__delete"
                                   type="button"
                                   href="{{ route('admin.note.delete', ['id' => $note->id]) }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="admin-notes-block">- Здесь пока нет ни одной записи-</div>
                @endif

                @include('admin.note.create')
            </main>
        </div>
    </div>
@endsection