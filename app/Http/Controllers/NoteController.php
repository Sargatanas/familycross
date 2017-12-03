<?php

namespace App\Http\Controllers;

use App\Note;
use App\PublicNote;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    /**
     * Получить записку с конкретным id
     *
     * @param integer $id
     * @return Response
    */
    public function show($id) {
        $public_note = PublicNote::where(['note_id' => $id])->firstOrFail();

        return view('notes.public', [
            'public_note' =>  $public_note
        ]);
    }

    /**
     * Создать новую записку
     *
     * @return Response
    */
    public function create() {
        return view('notes.note.create');
    }
}
