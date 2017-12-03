@php
    /** @var \App\PublicNote $public_note */
@endphp

@extends('notes.layouts.base')

@section('title', $public_note->title)

@section('content')
    {!! $public_note->content !!}
@endsection