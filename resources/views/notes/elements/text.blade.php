<div class="note-block__element note-text">
    @if (filled($heading))
        <div class="note-text__heading">{{ $heading }}</div>
    @endif
    <div class="note-text__content">
        {!! $content !!}
    </div>
</div>