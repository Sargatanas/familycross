@php
    /** @var \App\PublicNote $public_note */
@endphp

@extends('layouts.base-header')

@section('title', $public_note->title)

@section('content')
    {!! $public_note->content !!}
@endsection