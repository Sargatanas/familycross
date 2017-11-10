<div class="notes-block__element notes-block-picture">
    <img src="{{ $content }}" class="image notes-block-picture__image">
    @if (filled($heading))
        <div class="notes-block-picture__caption">{{ $heading }}</div>
    @endif
</div>