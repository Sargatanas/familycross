@php
    /** @var \App\Note[] $notes */
@endphp

@extends('notes.layouts.base')

@section('title', 'Записки на площадке')

@section('content')
    <h1>Список записок (гы-гы-гы) на площадке</h1>
    <div class="notes-area area">
        <main class="notes-block">
            @foreach ($notes as $note)
                <div class="notes-block__heading">{{ $note->title }}</div>
                <a href="{{ route('admin.note.show', ['id' => $note->id]) }}">Редактировать записку</a>
                <a href="{{ route('admin.note.delete', ['id' => $note->id]) }}">Удалить записку</a>
                <hr />
            @endforeach

            @include('admin.note.create')
        </main>
    </div>
@endsection