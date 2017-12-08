<div class="note-block__element note-picture">
    <img src="{{ $content }}" class="image note-picture__content">
    @if (filled($heading))
        <div class="note-picture__heading">{{ $heading }}</div>
    @endif
</div>