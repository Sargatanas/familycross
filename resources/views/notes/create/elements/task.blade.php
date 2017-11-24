<div class="notes-block__element notes-block-create">
    <div class="notes-block-create__heading">
        Задание
        <div class="notes-block-create-order">
            <label for="task-order-{{ $task }}" class="notes-block-create-order__label">
                Порядок блока:
            </label>
            <input class="notes-block-create-order__input" type="number" id="task-order-{{ $task }}">
        </div>
    </div>
    <div class="notes-block-create-content">
        <div class="notes-block-create-content__area">
            <label for="task-heading-{{ $task }}" class="notes-block-create-content__label">
                Заголовок
            </label>
            <input type="text" class="notes-block-create-content__field" id="task-heading-{{ $task }}">
        </div>
        <div class="notes-block-create-content__area">
            <label for="task-content-{{ $task }}" class="notes-block-create-content__label">
                Содержимое
            </label>
            <div class="notes-block-create-content__field">
                <textarea class="notes-block-create__textarea" id="task-content-{{ $task }}"></textarea>
            </div>
        </div>
    </div>
</div>