<div class="notes-block__element notes-block-task">
    @if (filled($heading))
        <div class="notes-block-task__heading">{{ $heading }}</div>
    @endif
    <div class="notes-block-task__content text">{!! $content !!}</div>
</div>