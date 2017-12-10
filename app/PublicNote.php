<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicNote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note_id',
    ];

    /**
     * Получить записку, к которой относится опубликованная записка
     */
    public function note()
    {
        return $this->belongsTo('App\Note', 'note_id');
    }

    /**
     * Найти все теги, привязанные к записке
     *
     * @return array
     */
    public function getTagsAttribute()
    {
        return Tag::where(['note_id' => $this->note_id])->get();
    }
}
