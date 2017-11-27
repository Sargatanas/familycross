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
Route::get('note/id{id}', 'NoteController@show')
    ->name('note.show')
;

/* Создание записки*/
Route::get('note/create', 'DraftNoteController@createShow')
    ->name('note.create.show')
;
Route::post('note/create/add', 'DraftNoteController@create')
    ->name('note.create')
;
