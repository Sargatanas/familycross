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
}
