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
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static Builder|\App\NoteElement whereId($value)
 * @method static Builder|\App\NoteElement whereNoteId($value)
 * @method static Builder|\App\NoteElement whereType($value)
 * @method static Builder|\App\NoteElement whereHeading($value)
 * @method static Builder|\App\NoteElement whereContent($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\NoteElement onlyTrashed()
 * @method static bool|null restore()
*/
class NoteElement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';
}
