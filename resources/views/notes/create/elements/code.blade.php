<div class="notes-block__element notes-block-create">
    <div class="notes-block-create__heading">
        Код
        <div class="notes-block-create-order">
            <label for="code-order-{{ $code }}" class="notes-block-create-order__label">
                Порядок блока:
            </label>
            <input class="notes-block-create-order__input" type="number" id="code-order-{{ $code }}">
        </div>
    </div>
    <div class="notes-block-create-content">
        <div class="notes-block-create-content__area">
            <label for="code-heading-{{ $code }}" class="notes-block-create-content__label">
                Имя файла
            </label>
            <input type="text" class="notes-block-create-content__field" id="code-heading-{{ $code }}">
        </div>
        <div class="notes-block-create-content__area">
            <label for="code-content-{{ $code }}" class="notes-block-create-content__label">
                Код
            </label>
            <div class="notes-block-create-content__field">
                <textarea class="notes-block-create__textarea" id="code-content-{{ $code }}"></textarea>
            </div>
        </div>
    </div>
</div>