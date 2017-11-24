<div class="notes-block__element notes-block-create">
    <div class="notes-block-create__heading">
        Cписок литературы
        <div class="notes-block-create-order">
            <label for="literature-order-{{ $literature }}" class="notes-block-create-order__label">
                Порядок блока:
            </label>
            <input class="notes-block-create-order__input" type="number" id="literature-order-{{ $literature }}">
        </div>
    </div>
    <div class="notes-block-create-content">
        <div class="notes-block-create-content__area">
            <label for="literature-content-{{ $literature }}" class="notes-block-create-content__label">
                Содержимое
            </label>
            <div class="notes-block-create-content__field">
                <textarea class="notes-block-create__textarea" id="literature-content-{{ $literature }}"></textarea>
            </div>
        </div>
    </div>
</div>