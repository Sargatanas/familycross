<div class="notes-block__element notes-block-create">
    <div class="notes-block-create__heading">
        Важная информация
        <div class="notes-block-create-order">
            <label for="important-order-{{ $important }}" class="notes-block-create-order__label">
                Порядок блока:
            </label>
            <input class="notes-block-create-order__input" type="number" id="important-order-{{ $important }}">
        </div>
    </div>
    <div class="notes-block-create-content">
        <div class="notes-block-create-content__area">
            <label for="important-heading-{{ $important }}" class="notes-block-create-content__label">
                Тип блока
            </label>
            <select>
                <option value="">
                    -выберите тип-
                </option>
            </select>
        </div>
        <div class="notes-block-create-content__area">
            <label for="important-content-{{ $important }}" class="notes-block-create-content__label">
                Содержимое
            </label>
            <div class="notes-block-create-content__field">
                <textarea class="notes-block-create__textarea" id="important-content-{{ $important }}"></textarea>
            </div>
        </div>
    </div>
</div>