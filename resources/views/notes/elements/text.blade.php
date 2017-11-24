<div class="notes-block__element notes-block-text">
    @if (filled($heading))
        <div class="notes-block-text__heading">{{ $heading }}</div>
    @endif
    <div class="notes-block-text__content">
        {!! $content !!}
    </div>
</div>