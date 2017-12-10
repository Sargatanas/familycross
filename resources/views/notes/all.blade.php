@php
    /** @var \App\Note[] $notes */
    date_default_timezone_set('Asia/Yekaterinburg');
@endphp

@extends('notes.layouts.base')

@section('title', 'Записки на площадке')

@section('content')
    <main class="area notes">
        <div class="notes__heading">
            Список записей
        </div>
        <div class="notes__content">
            @if(filled($notes))
                @foreach ($notes as $note)
                    <div class="note-block">
                        <div class="note-block__heading">
                            {{ $note->title }}
                            <div class="note-block__date">
                                {{ $note->created_at->format('d.m.Y H:i') }}
                            </div>
                        </div>
                        <div class="note-block__description">
                            {!! $note->description !!}
                        </div>
                        <div class="note-block__href">
                            <a class="button"
                               href="{{ route('note.show', ['id' => $note->note_id]) }}"
                               title="Перейти к записке">
                                Читать
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="">- Здесь пока нет ни одной записи-</div>
            @endif
        </div>
    </main>
@endsection