@php
    /** @var \App\Block $block */
@endphp

<form class="admin-notes-edit"
      id="create"
      name="create"
      method="POST"
      action="{{ route('admin.block.text.edit', ['note_id' => $block->note_id, 'id' => $block->id]) }}">
    {{ csrf_field() }}

    <div class="admin-notes-edit-title">
        <div class="admin-notes-edit-title-order">
            <label for="order" class="admin-notes-edit-title-order__heading">
                #
            </label>

            <input id="order"
                   type="number"
                   class="admin-notes-edit-title-order__input"
                   name="order"
                   value="{{ $block->order }}"
                   required>
        </div>
        <div class="admin-notes-edit-title__heading">Текстовый блок</div>
        <a class="admin-notes-edit-title__delete"
           type="button"
           href="{{ route('admin.block.delete', ['note_id' => $block->note_id, 'id' => $block->id]) }}">
        </a>
    </div>

    <div class="admin-notes-edit__content">

        <div class="admin-notes-edit-element">
            <label for="heading" class="admin-notes-edit-element__heading">
                Подзаголовок
            </label>

            <input id="heading"
                   type="text"
                   class="admin-notes-edit-element__input"
                   name="heading"
                   value="{{ $block->heading }}">
         </div>

        <div class="admin-notes-edit-element">
            <label for="content" class="admin-notes-edit-element__heading">
                Содержимое
            </label>

            <textarea id="content"
                      class="admin-notes-edit-element__input
                             admin-notes-edit-element__input_textarea"
                      name="content"
                      required>{{ old('content', $block->content) }}</textarea>
        </div>

        <div class="admin-notes-edit-buttons">
            <input class="admin-notes-add-buttons__element
                          admin-notes-add-buttons__element_margin-0"
                   type="submit"
                   value="Сохранить">
        </div>
    </div>

</form>