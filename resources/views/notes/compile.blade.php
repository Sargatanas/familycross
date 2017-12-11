@php
    /** @var \App\Note $note */
@endphp

<main class="area notes notes_show">
    <div class="notes__heading">{{ $note->title }}</div>
    <div class="notes__content">
        @foreach ($note->elements as $element)
            @include('notes.note.elements.'.$element->type,
               [
                   'heading' => $element->heading,
                   'content' => $element->content,
               ]
            )
        @endforeach
    </div>
</main>