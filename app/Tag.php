<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App/Tag
 *
 * @property string $id
 * @property string $note_id
 * @property string $tag_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @method static Builder|\App\Tag whereId($value)
 * @method static Builder|\App\Tag whereNoteId($value)
 * @method static Builder|\App\Tag whereTagName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $tags
 * @method static \Illuminate\Database\Query\Builder|\App\Tag onlyTrashed()
 * @method static bool|null restore()
*/
class Tag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note_id', 'tag_name'
    ];

    /**
     * Получить записку, к которой относится тег
     */
    public function note()
    {
        return $this->belongsTo('App\Note', 'note_id');
    }
}
