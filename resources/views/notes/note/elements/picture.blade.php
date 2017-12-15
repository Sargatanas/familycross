<div class="note-block__element note-picture">
    <div class="note-picture__content">
        <img src="{{ Storage::disk('s3')->url($content) }}" alt="O-o-ops">
    </div>
    @if (filled($heading))
        <div class="note-picture__heading">{{ $heading }}</div>
    @endif
</div>