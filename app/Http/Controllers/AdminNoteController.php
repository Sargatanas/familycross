<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\IsNoteExist;
use App\Http\Middleware\IsPublicNoteExist;
use App\Http\Requests\NoteCreateRequest;
use App\Http\Requests\NoteInfoEditRequest;
use App\Note;
use App\PublicNote;
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
        $this->middleware(CheckAuth::class);

        $this->middleware(IsNoteExist::class)->except(['showAll', 'create']);

        $this->middleware(IsPublicNoteExist::class)->only(['deletePublic']);
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

        $note = Note::orderBy('id', 'desc')->first();

        return redirect(route('admin.note.show', ['id' => $note->id]));
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

    /**
     * Опубликовать записку
     *
     * @param int $id Идентификатор записки
     * @return \Redirect
     * @throws
     */
    public function createPublic($id)
    {
        $note = Note::find($id);
        $public_note = PublicNote::firstOrCreate([
            'note_id' => $id
        ]);

        //компилируем записку
        $public_note->content = view('notes.compile', ['note' => $note])->render();
        $public_note->title = $note->title;
        $public_note->description = $note->description;
        $public_note->save();

        return redirect(route('admin.note.show', ['id' => $id]));
    }

    /**
     * Удалить опубликованную записку
     *
     * @param int $id Идентификатор записки
     * @return \Redirect
     * @throws
     */
    public function deletePublic($id)
    {
        $public_note = PublicNote::where(['note_id' => $id])->first();
        $public_note->delete();

        return redirect(route('admin.note.show', ['id' => $id]));
    }

    /**
     * Изменить заголовок записки
     *
     * @param int $note_id Идентификатор записки
     * @param NoteInfoEditRequest $request
     * @return \Redirect
    */
    public function infoEdit(NoteInfoEditRequest $request, int $note_id)
    {
        $note = Note::find($note_id);

        $note->title = $request->title;
        $note->description = $request->description;

        $note->save();

        return redirect(route('admin.note.show', ['id' => $note_id]));
    }
}
