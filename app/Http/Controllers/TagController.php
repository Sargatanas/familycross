<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Note;
use App\Http\Middleware\IsNoteExist;
use App\Http\Requests\TagCreateRequest;

class TagController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(IsNoteExist::class);
    }

    /**
     * Разобрать строку на отдельные теги
     *
     * @param TagCreateRequest $request
     * @param int $note_id Идентификатор записки
     * @return \Redirect
    */
    public function createTags(TagCreateRequest $request, $note_id)
    {

        Tag::where(['note_id' => $note_id])->delete();
        $tag_list = $request->tags;

        while(!blank($tag_list))
        {
            if (strpos($tag_list, ',') != false) {
                $temp_tag = strstr($tag_list, ',', true);
                $tag_list = strstr($tag_list, ',', false);
                $tag_list = substr($tag_list, 2);
            } else {
                $temp_tag = $tag_list;
                $tag_list = '';
            }
            $temp_tag = mb_strtolower(substr($temp_tag, 1));

            $tag = new Tag([
                'note_id' => $note_id,
                'tag_name' => $temp_tag
            ]);
            $tag->save();
        }

        return redirect(route('admin.note.show', ['id' => $note_id]));
    }
}
