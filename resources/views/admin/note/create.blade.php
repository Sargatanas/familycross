<form class="admin-add" id="create" name="create"
      method="POST" action="{{ route('admin.note.create') }}">
    {{ csrf_field() }}

    <div class="admin-add__heading">Новая записка</div>

    <div class="admin-add__content">
        <div class="admin-add-element">
            <label for="title"
                   class="admin-add-element__label">Заголовок</label>

            <input id="title"
                   type="text"
                   class="admin-add-element__input
                      {{ $errors->has('title') ? 'admin-notes-add-field__input_error' : '' }}"
                   name="title"
                   value="{{ old('title') }}"
                   autofocus>

        </div>

        @if ($errors->has('title'))
            <div class="admin-add__error">
                {{ $errors->first('title') }}
            </div>
        @endif

        <div class="admin-add__button">
            <button type="submit"
                    class="admin-notes-add-buttons__element
                           admin-notes-add-buttons__element_margin-0
                           admin-notes-add-block__button">
                Создать
            </button>
        </div>
    </div>
</form>