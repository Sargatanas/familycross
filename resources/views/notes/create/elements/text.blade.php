<div class="notes-block__element notes-block-create">
    <div class="notes-block-create__heading">
        Текстовый блок
        <div class="notes-block-create-order">
            <label for="order-{{ $element->id }}" class="notes-block-create-order__label">
                Порядок блока:
            </label>
            <input class="notes-block-create-order__input"
                   type="number"
                   id="order-{{ $element->id }}"
                   name="order-{{ $element->id }}"
                   value="{{ $element->order }}">
        </div>
    </div>
    <div class="notes-block-create-content">
        <div class="notes-block-create-content__area">
            <label for="heading-{{ $element->id }}" class="notes-block-create-content__label">
                Подзаголовок
            </label>
            <input type="text"
                   class="notes-block-create-content__field"
                   id="heading-{{ $element->id }}"
                   name="heading-{{ $element->id }}"
                   value="{{ $element->heading }}">
        </div>
        <div class="notes-block-create-content__area">
            <label for="content-{{ $element->id }}" class="notes-block-create-content__label">
                Содержимое
            </label>
            <div class="notes-block-create-content__field">
                <textarea class="notes-block-create__textarea"
                          id="content-{{ $element->id }}"
                          name="content-{{ $element->id }}">{{ $element->content }}</textarea>
            </div>
        </div>
    </div>
</div>