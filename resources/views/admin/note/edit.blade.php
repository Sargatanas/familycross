@php
    /** @var \App\Note $note */
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp

@extends('notes.layouts.base')

@section('title', 'Редактирование записки')

@section('content')
    <div class="admin-area area">
        <main class="admin-area-notes">
            <div class="admin-area-notes__heading">Редактирование записки</div>

            <div class="admin-area-notes-title">
                <div class="admin-area-notes-title__heading">Заголовок:</div>
                <div class="admin-area-notes-title__content">{{ $note->title }}</div>
            </div>

            <div class="admin-area-notes__content">
                @include('admin.elements.error', ['errors' => $errors])

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

                <form class="admin-notes-add admin-notes-edit-block" id="create" name="create"
                      method="POST" action="{{ route('admin.block.create', ['id' => $note->id]) }}">
                    {{ csrf_field() }}

                    <div class="admin-notes-add__heading">Добавить блок</div>

                    <div class="admin-notes-add-block">
                        <label for="type"
                               class="admin-notes-add-block__heading">
                            Выберите тип блока
                        </label>

                        <select id="type" class="admin-notes-add-block__select" name="type">
                            <option value="{{ \App\Block::TYPE_TEXT }}"
                                    {{ old('type') == \App\Block::TYPE_TEXT ? 'selected' : '' }} >
                                текстовый блок
                            </option>
                            <option value="{{ \App\Block::TYPE_IMPORTANT }}"
                                    {{ old('type') == \App\Block::TYPE_IMPORTANT ? 'selected' : '' }} >
                                важная информация
                            </option>
                            <option value="{{ \App\Block::TYPE_TASK }}"
                                    {{ old('type') == \App\Block::TYPE_TASK ? 'selected' : ''}} >
                                задание
                            </option>
                            <option value="{{ \App\Block::TYPE_CODE }}"
                                    {{ old('type') == \App\Block::TYPE_CODE ? 'selected' : '' }} >
                                код
                            </option>
                            <option value="{{ \App\Block::TYPE_LITERATURE }}"
                                    {{ old('type') == \App\Block::TYPE_LITERATURE ? 'selected' : '' }} >
                                список литературы
                            </option>
                        </select>

                        <input class="admin-notes-add-buttons__element
                                      admin-notes-add-buttons__element_margin-0
                                      admin-notes-add-block__button"
                               type="submit"
                               value="Добавить">
                    </div>

                </form>
                @if( filled($note->publicNote) )
                    <div class="admin-notes-add-buttons">
                        <a class="admin-notes-add-buttons__element
                              admin-notes-add-buttons__element_size-md
                              admin-notes-add-buttons__element_color-green"
                           href="{{ route('admin.note.public', ['id' => $note->id]) }}">
                            Обновить
                        </a>
                        <a class="admin-notes-add-buttons__element
                              admin-notes-add-buttons__element_size-lg
                              admin-notes-add-buttons__element_color-red"
                           href="{{ route('admin.note.public.delete', ['id' => $note->id]) }}">
                            Удалить публикацию
                        </a>
                    </div>
                @else
                    <a class="admin-notes-add-buttons__element
                              admin-notes-add-buttons__element_size-md
                              admin-notes-add-buttons__element_color-green"
                       href="{{ route('admin.note.public', ['id' => $note->id]) }}">
                        Опубликовать
                    </a>
                @endif
            </div>
        </main>
    </div>
@endsection