@php
    /** @var \App\Note $note */
@endphp

@extends('notes.layouts.base')

@section('title', 'Новая записка')

@section('content')
    <div class="notes-area area">
        <main class="notes-block">
            <div class="notes-block__heading">Создание новой записки</div>
            <form class="notes-block-content" id="create" name="create" method="get">


                @include('notes.create.elements.text')

                @include('notes.create.elements.important')

                @include('notes.create.elements.code')

                @include('notes.create.elements.task')

                @include('notes.create.elements.literature')

                @section('elements')
                @show
                <div class="notes-block-add">
                    <div class="notes-block-add__icon"></div>
                    <select class="notes-block-add__select" id="add" name="add">
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