<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * app\NoteElement
 *
 * @property string $id
 * @property string $note_id
 * @property string $type
 * @property string $heading
 * @property string $content
 * @property int $order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static Builder|\App\Block whereId($value)
 * @method static Builder|\App\Block whereNoteId($value)
 * @method static Builder|\App\Block whereType($value)
 * @method static Builder|\App\Block whereHeading($value)
 * @method static Builder|\App\Block whereContent($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Block onlyTrashed()
 * @method static bool|null restore()
*/
class Block extends Model
{
    // Возможные типы блоков
    const TYPE_TEXT = 'text';

    const TYPE_IMPORTANT = 'important';

    const TYPE_CODE = 'code';

    const TYPE_TASK = 'task';

    const TYPE_LITERATURE = 'literature';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order', 'heading', 'content',
        'type'
    ];

    /**
     * Получить записку, к которой относится блок
     */
    public function note()
    {
        return $this->belongsTo('App\Note', 'note_id');
    }
}
