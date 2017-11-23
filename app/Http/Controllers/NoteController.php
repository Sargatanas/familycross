<?php

namespace App\Http\Controllers;

use App\Note;
use App\NoteElement;
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
        return view('notes.note', [
            'note' =>  Note::find($id)
        ]);
    }
}
