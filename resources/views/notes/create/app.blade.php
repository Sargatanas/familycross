@php
    /** @var \App\Note $note */
@endphp

@extends('notes.layouts.base')

@section('title', 'Новая записка')

@section('content')
    <div class="notes-area area">
        <main class="notes-block">
            <div class="notes-block__heading">Создание новой записки</div>
            <form class="notes-block-content" id="create" name="create"
                  method="POST" action="{{ route('note.create') }}">
                {{ csrf_field() }}

                @foreach($elements as $element)
                    @include('notes.create.elements.'.$element->type, ['element' => $element])
                @endforeach

                @section('elements')
                @show
                <div class="notes-block-add">
                    <div class="notes-block-add__icon"></div>
                    <select class="notes-block-add__select" id="type" name="type">
                        <option value="">
                            -выберите тип блока-
                        </option>
                        <option value="text">
                            текстовый блок
                        </option>
                        <option value="important">
                            важная информация
                        </option>
                        <option value="code">
                            код
                        </option>
                        <option value="task">
                            задание
                        </option>
                        <option value="literature">
                            список литературы
                        </option>
                    </select>
                    <input class="notes-block-add__button" type="submit" value="Добавить">
                </div>
            </form>
        </main>
    </div>
@endsection