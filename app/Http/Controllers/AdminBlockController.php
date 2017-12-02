<?php

namespace App\Http\Controllers;

use App\Block;
use App\Http\Middleware\IsNoteExist;
use App\Http\Requests\BlockCreateRequest;
use App\Note;
use Illuminate\Http\Request;

class AdminBlockController extends Controller
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
     * Создать шаблон для новой записки
     *
     * @param BlockCreateRequest $request
     * @param int $id Идентификатор записки
     * @return \Redirect
     */
    public function create(BlockCreateRequest $request, $id)
    {
        $note = Note::find($id);
        $order = $note->blocks()->max('order') ?? 0;

        $block = new Block([
            'type' => $request->type,
            'order' => ++$order,
            'heading' => '',
            'content' => ''
        ]);

        $note->blocks()->save($block);

        return redirect(route('admin.note.show', ['id' => $id]));
    }
}
