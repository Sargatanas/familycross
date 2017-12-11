<div class="note-block__element note-task">
    @if (filled($heading))
        <div class="note-task__heading">{{ $heading }}</div>
    @endif
    <div class="note-task__content text">{!! $content !!}</div>
</div>