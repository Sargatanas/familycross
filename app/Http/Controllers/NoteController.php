<?php

namespace App\Http\Controllers;

use App\PublicNote;
use App\Tag;
use Illuminate\Http\Request;
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

    /**
     * Показать список всех опубликованных записок на площадке
     *
     * @param Request $request
     * @return Response
     */
    public function showAll(Request $request)
    {
        $notes = PublicNote::orderBy('created_at')->get();
        $tags = Tag::orderBy('tag_name')->get();

        $sorted_notes = $notes;
        $sort_temp = array();
        if(!blank($request->add)) {
            $sort_temp[] = $request->add;
        }

        if (!blank($request->sort)) {

            foreach($request->sort as $sort_element)
            {
                if ($sort_element !== $request->delete) {
                    $sort_temp[] = $sort_element;
                }
            }

            if(!blank($sort_temp)) {
                $sorted_notes = array();
                foreach ($notes as $note)
                {
                    $tags = array();
                    foreach($note->tags as $tag)
                    {
                        $tags[] = $tag->tag_name;
                    }

                    if (blank(array_diff($sort_temp, $tags))) {
                        $sorted_notes[] = $note;
                    }
                }
            }
        }
        asort($sort_temp);

        // получим теги всех опубликованных записок
        $tag_list = array();
        foreach ($notes as $note)
        {
            foreach($note->tags as $tag)
            {
                if(!in_array($tag->tag_name, $tag_list)) {
                    $tag_list[] = $tag->tag_name;
                }
            }
        }

        return view('notes.all', ['notes' => $sorted_notes, 'sort' => $sort_temp, 'tags' => $tag_list]);
    }
}