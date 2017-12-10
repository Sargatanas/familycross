<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
})
    ->name('main')
;

/**
 * Просмотр записок
 *
 */
Route::get('notes', 'NoteController@showAll')
    ->name('notes.show')
;
Route::get('note/id{id}', 'NoteController@show')
    ->name('note.show')
;



/**
 * Работа непосредственно с записками
 *
 */
// список записок
Route::get('/admin/notes', 'AdminNoteController@showAll')
    ->name('admin.notes.show')
;
// создание новой записки
Route::post('/admin/note/create', 'AdminNoteController@create')
    ->name('admin.note.create')
;
// удаление записки
Route::get('/admin/note/id{id}/delete', 'AdminNoteController@delete')
    ->name('admin.note.delete')
;

/**
 * Работа внутри записки
 *
 */
// интерфейс редактирования записки
Route::get('/admin/note/id{id}', 'AdminNoteController@editShow')
    ->name('admin.note.show')
;
// редактирование информации о записи (название, описание)
Route::post('/admin/note/id{note_id}/edit', 'AdminNoteController@infoEdit')
    ->name('admin.note.info.edit')
;
// редактирование тегов
Route::post('/admin/note/id{note_id}/tags/edit', 'TagController@createTags')
    ->name('admin.note.tags.edit')
;

// создание нового блока
Route::post('/admin/note/id{id}/block', 'AdminBlockController@create')
    ->name('admin.block.create')
;
// удаление блока
Route::get('/admin/note/id{note_id}/block/id{id}', 'AdminBlockController@delete')
    ->name('admin.block.delete')
;
// редактирование блока кода. Возможно в дальнейшем будем разница, но пока они все редактируются одинаково
Route::post('/admin/note/id{note_id}/block/type/code/id{id}', 'AdminBlockController@codeEdit')
    ->name('admin.block.code.edit')
;
Route::post('/admin/note/id{note_id}/block/type/important/id{id}', 'AdminBlockController@codeEdit')
    ->name('admin.block.important.edit')
;
Route::post('/admin/note/id{note_id}/block/type/literature/id{id}', 'AdminBlockController@codeEdit')
    ->name('admin.block.literature.edit')
;
Route::post('/admin/note/id{note_id}/block/type/picture/id{id}', 'AdminBlockController@codeEdit')
    ->name('admin.block.picture.edit')
;
Route::post('/admin/note/id{note_id}/block/type/task/id{id}', 'AdminBlockController@codeEdit')
    ->name('admin.block.task.edit')
;
Route::post('/admin/note/id{note_id}/block/type/text/id{id}', 'AdminBlockController@codeEdit')
    ->name('admin.block.text.edit')
;

// опубликовать записку
Route::get('/admin/note/id{note_id}/public', 'AdminNoteController@createPublic')
    ->name('admin.note.public')
;
// удалить публикацию
Route::get('/admin/note/id{note_id}/public/delete', 'AdminNoteController@deletePublic')
    ->name('admin.note.public.delete')
;