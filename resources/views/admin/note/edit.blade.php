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

            <form class="admin-notes-edit"
                  id="create"
                  name="create"
                  method="POST"
                  action="{{ route('admin.note.info.edit', ['note_id' => $note->id]) }}">
                {{ csrf_field() }}

                <div class="admin-notes-edit__content">
                    <div class="admin-notes-edit-element">
                        <label for="title" class="admin-notes-edit-element__heading">
                            Название
                        </label>
                        <input id="title"
                               type="text"
                               class="admin-notes-edit-element__input"
                               name="title"
                               value="{{ $note->title }}">
                    </div>

                    <div class="admin-notes-edit-element">
                        <label for="description" class="admin-notes-edit-element__heading">
                            Описание
                        </label>

                        <textarea id="description"
                                  class="admin-notes-edit-element__input
                                         admin-notes-edit-element__input_textarea"
                                  name="description">{{ $note->description_plain }}</textarea>
                    </div>

                    <div class="admin-notes-edit-buttons">
                        <input class="admin-notes-add-buttons__element
                          admin-notes-add-buttons__element_margin-0"
                               type="submit"
                               value="Сохранить">
                    </div>
                </div>
            </form>

            <form class="admin-notes-edit"
                  id="create"
                  name="create"
                  method="POST"
                  action="{{ route('admin.note.tags.edit', ['note_id' => $note->id]) }}">
                {{ csrf_field() }}

                <div class="admin-notes-edit-title admin-notes-edit-title_tags">
                    Теги
                </div>

                <div class="admin-notes-edit__content">
                    <div class="admin-notes-edit-element">
                        Введите теги через запятую, предваряя каждый знаком #.
                    </div>
                    <div class="admin-notes-edit-element">
                        <strong>Пример:&nbsp;&nbsp;</strong> #css, #html, #js
                    </div>

                    <div class="admin-notes-edit-element">
                        <input id="tags"
                               type="text"
                               class="admin-notes-edit-element__input
                                      admin-notes-edit-element__input_tags"
                               name="tags"
                               value="{{ $note->tags_at_string }}"
                               required>
                    </div>

                    <div class="admin-notes-edit-buttons">
                        <input class="admin-notes-add-buttons__element
                          admin-notes-add-buttons__element_margin-0"
                               type="submit"
                               value="Сохранить">
                    </div>
                </div>
            </form>

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

                        @case(\App\Block::TYPE_PICTURE)
                            @include('admin.elements.picture.edit', ['block' => $block])
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
                            Выберите тип
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
                            <option value="{{ \App\Block::TYPE_PICTURE }}"
                                    {{ old('type') == \App\Block::TYPE_PICTURE ? 'selected' : '' }} >
                                картинка
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