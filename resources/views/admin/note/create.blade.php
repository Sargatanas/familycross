<form class="admin-notes-add" id="create" name="create"
      method="POST" action="{{ route('admin.note.create') }}">
    {{ csrf_field() }}

    <div class="admin-notes-add__heading">Новая записка</div>

    <div class="admin-notes-add-note">
        <label for="title" class="admin-notes-add-note__heading">Заголовок</label>

        <input id="title"
               type="text"
               class="admin-notes-add-note__input
                      {{ $errors->has('title') ? 'admin-notes-add-field__input_error' : '' }}"
               name="title"
               value="{{ old('title') }}"
               autofocus>

        <div class="admin-notes-add__button">
            <button type="submit" class="button ">
                Создать
            </button>
        </div>
    </div>

    @if ($errors->has('title'))
        <div class="admin-notes-add__error">
            {{ $errors->first('title') }}
        </div>
    @endif
</form>