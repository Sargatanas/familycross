<div class="note-block__element note-picture">
    <div class="note-picture__content">
        <img src="{{ asset('storage/'.$content) }}" alt="O-o-ops">
    </div>
    @if (filled($heading))
        <div class="note-picture__heading">{{ $heading }}</div>
    @endif
</div>