<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * app\Note
 *
 * @mixin \Eloquent
 * @property string $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static Builder|\App\Note whereId($value)
 * @method static Builder|\App\Note whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Note onlyTrashed()
 * @method static bool|null restore()
*/
class Note extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes_list';

    /**
     * Найти все элементы, принадлежащие конкретной записке
     *
    */
    public function getElementsAttribute()
    {
        return $this->hasMany('App\NoteElement', 'note_id')->orderBy('id')->get();
    }
}
