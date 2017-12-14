<?php

namespace App\Http\Controllers;

use App\Block;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\IsBlockExist;
use App\Http\Middleware\IsNoteExist;
use App\Http\Requests\BlockCodeEditRequest;
use App\Http\Requests\BlockCreateRequest;
use App\Note;
use DB;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\UploadedFile;
use Exception;
use Storage;

class AdminBlockController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(CheckAuth::class);

        $this->middleware(IsNoteExist::class);

        $this->middleware(IsBlockExist::class)->except(['create']);
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

    /**
     * Удалить блок кода
     *
     * @param int $note_id Идентификатор записки
     * @param int $id Идентификатор блока
     * @return \Redirect
     * @throws
     */
    public function delete($note_id, $id)
    {
        $note = Note::find($note_id);
        $block = Block::find($id);

        $blocks = $note->blocks()->where('order', '>', $block->order)->get();
        foreach ($blocks as $_block) {
            $_block->order--;
            $_block->save();
        }

        $block->delete();

        return redirect(route('admin.note.show', ['id' => $note->id]));
    }

    /**
     * Редактировать блок кода
     *
     * @param BlockCodeEditRequest $request
     * @param int $note_id Идентификатор записки
     * @param int $id Идентификатор блока
     * @return \Redirect
     */
    public function codeEdit(BlockCodeEditRequest $request, $note_id, $id)
    {
        $note = Note::find($note_id);
        $block = Block::find($id);

        if ($request->order != $block->order) {
            //костылья валидация, додумать
            $max = $note->blocks()->max('order');
            $validator = Validator::make($request->all(), [
                'order' => "required|integer|between:1,{$max}",
            ]);
            if ($validator->fails()) {
                return redirect(route('admin.note.show', ['id' => $note->id]))
                    ->withErrors($validator)
                    ->withInput();
            }

            //сдвигаем порядок
            if ($request->order > $block->order) {
                $blocks = $note->blocks()->where([['order', '>', $block->order], ['order', '<', $request->order + 1]])->get();
                foreach ($blocks as $_block) {
                    $_block->order--;
                    $_block->save();
                }
            } else {
                $blocks = $note->blocks()->where([['order', '<', $block->order], ['order', '>', $request->order - 1]])->get();
                foreach ($blocks as $_block) {
                    $_block->order++;
                    $_block->save();
                }
            }

            $block->order = $request->order;
        }

        //проверка типа получаемого контента
        if(blank($request->file)) {
            $block->content = $request->content;
        } else {
            if (Storage::disk('public')->exists($block->content)) {
                Storage::disk('public')->delete($block->content);
            }

            $storage_path = Storage::disk('public')->put('', $request->file);
            $block->content = basename($storage_path);
        }

        $block->heading = $request->heading;

        $block->save();

        return redirect(route('admin.note.show', ['id' => $note->id]));
    }
}
