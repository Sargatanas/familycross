@php
    /** @var \App\Note $note */
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

@extends('notes.layouts.base')

@section('title', 'Редактирование записки')

@section('content')
    <div class="notes-area area">
        <main class="notes-block">
            <div class="notes-block__heading">Редактирование записки</div>

            @if ($errors->has('type'))
                <span class="">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif

            @if ($errors->has('order'))
                <span class="">
                    <strong>{{ $errors->first('order') }}</strong>
                </span>
            @endif

            @if ($errors->has('heading'))
                <span class="">
                    <strong>{{ $errors->first('heading') }}</strong>
                </span>
            @endif

            @if ($errors->has('content'))
                <span class="">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif

            @foreach($note->blocks as $block)
                @switch($block->type)
                    @case(\App\Block::TYPE_TASK)
                        @include('admin.elements.task.edit', ['block' => $block])
                        @break

                    @case(\App\Block::TYPE_TEXT)
                        @include('admin.elements.text.edit', ['block' => $block])
                        @break

                    @case(\App\Block::TYPE_LITERATURE)
                        @include('admin.elements.literature.edit', ['block' => $block])
                        @break

                    @case(\App\Block::TYPE_IMPORTANT)
                        @include('admin.elements.important.edit', ['block' => $block])
                        @break

                    @case(\App\Block::TYPE_CODE)
                        @include('admin.elements.code.edit', ['block' => $block])
                        @break
                @endswitch
            @endforeach

            <form class="notes-block-content" id="create" name="create"
                  method="POST" action="{{ route('admin.block.create', ['id' => $note->id]) }}">
                {{ csrf_field() }}

                <div class="">
                    <label for="type" class="">Выберите тип блока</label>

                    <div class="">
                        <select id="type" class="" name="type">
                            <option value="{{ \App\Block::TYPE_TASK }}"
                                    {{ old('type') == \App\Block::TYPE_TASK ? 'selected' : ''}} >
                                задание
                            </option>
                            <option value="{{ \App\Block::TYPE_TEXT }}"
                                    {{ old('type') == \App\Block::TYPE_TEXT ? 'selected' : '' }} >
                                текстовый блок
                            </option>
                            <option value="{{ \App\Block::TYPE_LITERATURE }}"
                                    {{ old('type') == \App\Block::TYPE_LITERATURE ? 'selected' : '' }} >
                                список литературы
                            </option>
                            <option value="{{ \App\Block::TYPE_IMPORTANT }}"
                                    {{ old('type') == \App\Block::TYPE_IMPORTANT ? 'selected' : '' }} >
                                важная информация
                            </option>
                            <option value="{{ \App\Block::TYPE_CODE }}"
                                    {{ old('type') == \App\Block::TYPE_CODE ? 'selected' : '' }} >
                                код
                            </option>
                        </select>
                    </div>
                </div>

                <input class="notes-block-add__button" type="submit" value="Добавить">
            </form>
        </main>
    </div>
@endsection