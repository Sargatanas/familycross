<?php

namespace App\Http\Controllers;

use App\DraftNote;
use Illuminate\Http\Response;
use App\Http\Requests\NoteElementCreateRequest;

class DraftNoteController extends Controller
{
    /**
     * Показываем страницу создания записки
     *
     * @return Response
     */
    public function createShow()
    {
        return view('notes.create.app', ['elements' => DraftNote::orderBy('order')->get()]);
    }

    /**
     * Обработка события создания записки
     *
     * @param NoteElementCreateRequest $request
     * @return Response
     */
    public function create(NoteElementCreateRequest $request) {
        $type = $request->input('type');
        if ($type != '')
        {
            $draft_note = new DraftNote(['type' => $type]);
            $draft_note -> save();
        }
    }
}
