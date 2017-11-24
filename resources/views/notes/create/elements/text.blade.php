<div class="notes-block__element notes-block-create">
    <div class="notes-block-create__heading">
        Текстовый блок
        <div class="notes-block-create-order">
            <label for="text-order-{{ $text }}" class="notes-block-create-order__label">
                Порядок блока:
            </label>
            <input class="notes-block-create-order__input" type="number" id="text-order-{{ $text }}">
        </div>
    </div>
    <div class="notes-block-create-content">
        <div class="notes-block-create-content__area">
            <label for="text-heading-{{ $text }}" class="notes-block-create-content__label">
                Подзаголовок
            </label>
            <input type="text" class="notes-block-create-content__field" id="text-heading-{{ $text }}">
        </div>
        <div class="notes-block-create-content__area">
            <label for="text-content-{{ $text }}" class="notes-block-create-content__label">
                Содержимое
            </label>
            <div class="notes-block-create-content__field">
                <textarea class="notes-block-create__textarea" id="text-content-{{ $text }}"></textarea>
            </div>
        </div>
    </div>
</div>