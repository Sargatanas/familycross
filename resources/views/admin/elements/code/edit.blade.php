@php
    /** @var \App\Block $block */
@endphp

<form class="notes-block-content" id="create" name="create"
      method="POST" action="{{ route('admin.block.code.edit', ['note_id' => $block->note_id, 'id' => $block->id]) }}">
    {{ csrf_field() }}
    <h1>Код</h1>
    <div class="">
        <label for="order" class="">Порядок</label>

        <div class="">
            <input id="order" type="number" class="" name="order"
                   value="{{ $block->order }}">
        </div>
    </div>

    <div class="">
        <label for="heading" class="">Имя файла</label>

        <div class="">
            <input id="heading" type="text" class="" name="heading"
                   value="{{ $block->heading }}">
        </div>
    </div>

    <div class="">
        <label for="content" class="">Код</label>

        <div class="col-md-6">
            <textarea id="content" class="" name="content">{{ old('content', $block->content) }}</textarea>
        </div>
    </div>

    <input class="notes-block-add__button" type="submit" value="Добавить">
    <a href="{{ route('admin.block.delete', ['note_id' => $block->note_id, 'id' => $block->id]) }}">удалить</a>
</form>