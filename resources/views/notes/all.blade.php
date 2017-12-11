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
        @if (!blank($sort))
            <div class="notes-sort">
                <div class="notes-sort__heading">
                    Сортировка по
                </div>
                <div class="notes-sort-content">
                    @foreach ($sort as $sort_tag)
                        <div class="notes-sort-tag">
                            <div class="notes-sort-tag__text">
                                {{ $sort_tag }}
                            </div>
                            <a class="notes-sort-tag__delete"
                               href="{{ route('notes.show', ['sort' => $sort, 'tag_delete' => $sort_tag]) }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
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

                        <div class="note-block__content">
                            <div class="note-block__description">
                                {!! $note->description !!}
                            </div>

                            <div class="note-block-tags">
                                @foreach ($note->tags as $tag)
                                    <a class="note-block-tags__element"
                                       href="{{ route('notes.show', ['sort' => [$tag->tag_name]]) }}">
                                        {{ $tag->tag_name }}
                                    </a>
                                @endforeach
                            </div>

                            <div class="note-block__href">
                                <a class="button"
                                   href="{{ route('note.show', ['id' => $note->note_id]) }}"
                                   title="Перейти к записке">
                                    Читать
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="">- Здесь пока нет ни одной записи-</div>
            @endif
        </div>
    </main>
@endsection