<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsNoteExist;
use App\Http\Requests\NoteCreateRequest;
use App\Note;
use Illuminate\Http\Request;
use Response;

class AdminNoteController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(IsNoteExist::class)->only(['delete', 'editShow']);
    }

    /**
     * Показать список всех записок на площадке
     *
     * @return Response
     */
    public function showAll()
    {
        $notes = Note::all();
        return view('admin.notes.all', compact('notes'));
    }

    /**
     * Создать шаблон для новой записки
     *
     * @param NoteCreateRequest $request
     * @return \Redirect
     */
    public function create(NoteCreateRequest $request)
    {
        Note::create($request->all());

        return redirect(route('admin.notes.show'));
    }

    /**
     * Удалить записку
     *
     * @param int $id Идентификатор записки
     * @return \Redirect
     * @throws \Exception
     */
    public function delete($id)
    {
        Note::find($id)->delete();

        return redirect(route('admin.notes.show'))
            ->with(['status' => 'Записка была успешно удалена'])
        ;
    }

    /**
     * Показать интерфейс редактирования записки
     *
     * @param int $id Идентификатор записки
     * @return Response
     */
    public function editShow($id)
    {
        return view('admin.note.edit', [
            'note' => Note::find($id)
        ]);
    }

}
