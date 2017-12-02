<form class="notes-block-content" id="create" name="create"
      method="POST" action="{{ route('admin.note.create') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Title</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control" name="title"
                   value="{{ old('title') }}" autofocus>

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <button type="submit">Создать записку</button>
</form>