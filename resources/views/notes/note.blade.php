@php
    /** @var \App\Note $note */
@endphp

@extends('notes.layouts.base')

@section('title', $note->title)

@section('heading', $note->title)

@section('content')
 @foreach ($note->elements as $element)
     @include('notes.elements.'.$element->type,
        [
            'heading' => $element->heading,
            'content' => $element->content
        ]
     )
 @endforeach
@endsection