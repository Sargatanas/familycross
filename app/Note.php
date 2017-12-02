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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Block[] $blocks
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Получить все блоки текущей записки
     */
    public function blocks()
    {
        return $this->hasMany('App\Block', 'note_id')->orderBy('order');
    }

    /**
     * Получить текущую опубликоанную записку
     */
    public function publicNote()
    {
        return $this->hasOne('App\PublicNote', 'note_id');
    }

    /**
     * Найти все элементы, принадлежащие конкретной записке
     *
    */
    public function getElementsAttribute()
    {
        return $this->hasMany('App\Block', 'note_id')->orderBy('order')->get();
    }
}
