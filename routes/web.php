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
    return view('welcome');
});

/* Просмотр записки*/
//Route::get('note/id{id}', 'NoteController@show')
//    ->name('note.show')
//;

/* Создание записки*/
//Route::get('note/create', 'DraftNoteController@createShow')
//    ->name('note.create.show')
//;
//Route::post('note/create/add', 'DraftNoteController@create')
//    ->name('note.create')
//;

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

// создание нового блока
Route::post('/admin/note/id{id}/block', 'AdminBlockController@create')
    ->name('admin.block.create')
;
