@php
    /** @var \App\Note $note */
@endphp

@extends('notes.layouts.base')

@section('title', $note->title)

@section('content')
    <div class="notes-area area">
        <main class="notes-block">
            <div class="notes-block__heading">{{ $note->title }}</div>
            <div class="notes-block-content">
                @foreach ($note->elements as $element)
                    @include('notes.elements.'.$element->type,
                       [
                           'heading' => $element->heading,
                           'content' => $element->content
                       ]
                    )
                @endforeach
            </div>
        </main>
    </div>
@endsection